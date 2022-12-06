<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Excursion\DeleteExcursionRequest;
use App\Http\Requests\Excursion\StoreExcursionRequest;
use App\Http\Requests\Excursion\UpdateExcursionRequest;
use App\Models\Excursion;
use App\Models\ExcursionImage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('backend.pages.dashboard');
    }

    public function excursion(): View
    {
        $excursions = Excursion::orderBy('id', 'DESC')->paginate(8);
        return view('backend.pages.excursion.index', compact('excursions'));
    }

    public function excursionEdit(int $id): View
    {
        $excursion = Excursion::findOrFail($id);
        return view('backend.pages.excursion.edit', compact('excursion'));
    }
    public function excursionCreate(): View
    {
        return view('backend.pages.excursion.create');
    }

    public function excursionStore(StoreExcursionRequest $request): RedirectResponse
    {
        $images_url = $this->newImages($request);

        $excursion = new Excursion();
        $newExcursion = $excursion->create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'age' => $request->age,
            'place' => $request->place,
            'program' => $request->program,
            'including' => $request->including,
            'start_place' => 'Грозный',
            'end_place' => 'Грозный',
        ]);

        foreach ($images_url as $image) {
            $excursion->images()->insert([
                'link' => $image,
                'excursion_id' => $newExcursion->id
            ]);
        }

        return redirect()->route('admin.excursion.index')->with('success', 'Экскурсия успешно создана');
    }

    public function excursionUpdate(UpdateExcursionRequest $request): RedirectResponse
    {
        $excursion = Excursion::findOrFail($request->id);
        $images_url = $this->newImages($request);

        $excursion->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'age' => $request->age,
            'place' => $request->place,
            'program' => $request->program,
            'including' => $request->including,
            'start_place' => 'Грозный',
            'end_place' => 'Грозный',
        ]);

        foreach ($images_url as $image) {
            $excursion->images()->insert([
                'link' => $image,
                'excursion_id' => $excursion->id
            ]);
        }

        return redirect()->back()->with('success', 'Экскурсия успешно обновлена');
    }

    public function excursionSchedule(int $id): View
    {
        $excursion = Excursion::findOrFail($id);
        return view('backend.pages.excursion.schedule.index', compact('excursion'));
    }

    public function excursionDeleteImage(Request $request): JsonResponse
    {
        $image = ExcursionImage::find($request->id);

        if($image) {
            $prevImage = $image->link;

            if (Storage::disk('images')->exists($prevImage)) {
                Storage::delete('public/excursion' . $prevImage);
            }

            $image->delete();

            session(['success' => 'Картинка успешно удалена']);
            return response()->json([
                'message' => 'Image was deleted',
                'code' => 200
            ]);
        }
        return response()->json([
            'message' => 'Image wasn\'t deleted',
            'code' => 404
        ]);
    }

    public function excursionDelete(DeleteExcursionRequest $request): RedirectResponse
    {
        $excursion = Excursion::find($request->id);

        if($excursion) {
            $prevImages = $excursion->images;

            foreach($prevImages as $prevImage) {
                if (Storage::disk('images')->exists($prevImage->link)) {
                    Storage::delete('public/excursion' . $prevImage->link);
                    $prevImage->delete();
                }
            }

            $excursion->delete();
        }

        return redirect()->back()->with('success', 'Экскурсия успешно удалена');
    }

    public function newImages(Request $request): array
    {
        $images_url = [];
        if($request->hasFile('images')){
            foreach($request->file('images') as $key => $image){
                // Имя и расширение файла
                $filenameWithExt = $image->getClientOriginalName();
                // Только оригинальное имя файла
                $filename = str()->slug(pathinfo($filenameWithExt, PATHINFO_FILENAME));
                // Расширение
                $extention = $image->getClientOriginalExtension();
                // Путь для сохранения
                $fileNameToStore = "/images/".$filename."_".time().rand(1,99).".".$extention;
                // Сохраняем файл
                $path = $image->storeAs('', $fileNameToStore, ['disk' =>   'images']);
                $images_url[] = $fileNameToStore;
            }
        }

        return $images_url;
    }

}
