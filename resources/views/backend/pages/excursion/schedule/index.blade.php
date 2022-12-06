@extends('backend.layouts.app')


@section('page_title') Расписание @endsection


@section('content')

<div class="row">
    <div class="col-12">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin-bottom: 0px">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success')}}
            </div>
        @endif

        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Расписание</h3>
            </div>


            <form method="POST" action="{{ route('admin.excursion.update') }}" enctype="multipart/form-data">
                @CSRF
                <input type="hidden" name="id" value="{{ $excursion->id }}">
                <div class="card-body">

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Список</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Дата</th>
                                    <th>Цена</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>05.12.2022 10:00</td>
                                    <td>3500</td>
                                    <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Добавление</h3>
                        </div>


                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="schedule" class="col-sm-2 col-form-label">Время</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="schedule" name="schedule_time" placeholder="{{ date('d.m.Y H:i') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="schedule_price" class="col-sm-2 col-form-label">Цена</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="schedule_price" name="schedule_price" value="{{ $excursion->price }}" placeholder="{{ $excursion->price }}">
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Добавить</button>
                            </div>

                        </form>
                    </div>


                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Обновить</button>
                </div>
            </form>
        </div>

    </div>
</div>


@endsection


@section('custom_script')
    <script>
        const deleteLinks = document.querySelectorAll('.delete-image');

        deleteLinks.forEach(link => {
            link.addEventListener('click', async (e) => {
                e.preventDefault()
                const csrf = "{{ csrf_token() }}";
                const link = e.currentTarget.href;
                const id = Number(e.currentTarget.dataset.id);

                try {
                    const response = await fetch(link, {
                        method: 'POST',
                        body: JSON.stringify({id: id}),
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrf
                        }
                    })

                    window.location.reload()
                }catch (e) {
                    console.log('error');
                }



            })
        })
    </script>
@endsection
