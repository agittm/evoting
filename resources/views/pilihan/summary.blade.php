@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                @if(Auth::user()->roles == '["ADMIN"]')
                                    <h3 class="card-title">Perolehan Suara</a></h3>
                                @elseif(Auth::user()->roles == '["VOTER"]')
                                    <h3 class="card-title">Informasi Pasangan Calon</a></h3>
                                @endif
                            </div>
                            <div class="col-md-6 text-right">
                                @if(Auth::user()->roles == '["ADMIN"]')
                                    <a href="{{ route('export.result') }}" class="btn btn-outline-primary btn-sm">Export Hasil Voting</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor Urut</th>
                                    <th>Foto Paslon</th>
                                    <th>Nama Pasangan</th>
                                    @if(Auth::user()->roles == '["ADMIN"]')
                                        <th>Jumlah Suara</th>
                                        <th>Persentase</th>
                                    @elseif(Auth::user()->roles == '["VOTER"]')
                                        <th>Visi</th>
                                        <th>Misi</th>
                                        <th>Program Kerja</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($candidates as $candidate)
                                <tr>
                                    <td>{{$candidate->id}}</td>
                                    <td>
                                        @if ($candidate->photo_paslon)
                                            <img src="{{asset('storage/'.$candidate->photo_paslon)}}" width="100px"/>
                                        @endif
                                    </td>
                                    <td>{{$candidate->nama_ketua.' dan '.$candidate->nama_wakil}}</td>
                                    @if(Auth::user()->roles == '["ADMIN"]')
                                        <td>{{$candidate->users->count()}} Suara</td>
                                        <td>{{number_format(($candidate->users->count()/$jumlah)*100)}} %</td>
                                    @elseif(Auth::user()->roles == '["VOTER"]')
                                        <td>{!! $candidate->visi !!}</td>
                                        <td>{!! $candidate->misi !!}</td>
                                        <td>{!! $candidate->program_kerja !!}</td>
                                    @endif
                                </tr>
                                @endforeach
                                <tfoot>
                                    <tr>
                                        <td colspan=10>
                                            {{$candidates->appends(Request::all())->links()}}
                                        </td>
                                    </tr>
                                </tfoot>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
