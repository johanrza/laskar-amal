@extends('admin.layouts.app')

@section('main_content')
    <div class="main-content">
        <section class="section">
            <div class="section-header d-flex justify-content-between">
                <h1>Testimonial</h1>
                <div>
                    <a href="{{ route('admin_testimonial_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                        Tambah Testimoni</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Sebutan atau Profesi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($testimonials as $testimonial)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <img src="{{ asset('uploads/' . $testimonial->photo) }}"
                                                            alt="" class="w_100">
                                                    </td>
                                                    <td>
                                                        {{ $testimonial->name }}
                                                    </td>
                                                    <td>
                                                        {{ $testimonial->designation }}
                                                    </td>
                                                    <td class="pt_10 pb_10">
                                                        <a href="{{ route('admin_testimonial_edit', $testimonial->id) }}"
                                                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('admin_testimonial_delete', $testimonial->id) }}"
                                                            class="btn btn-danger btn-sm"
                                                            onClick="return confirm('Apakah Anda yakin?');"><i
                                                                class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
