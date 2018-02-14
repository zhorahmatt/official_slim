@extends('jamselinas.layouts.main')
@section('meta')
    <meta name="description" content="Form Pendaftaran Jamselinas 8 Makassar 2018">
@endsection
@section('title')
    <title>Jamselinas 8 Makassar - Admin</title>
@endsection
@section('content')
    <section class="">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <table class="table table-responsive">
                        <tr>
                            <th>Nomor Registrasi</th>
                            <th>Nomor Peserta</th>
                            <th>Nama Peserta</th>
                            <th>Status Bayar</th>
                            <th>Status Peserta</th>
                            <th>Verifikasi</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($peserta as $pesertaJam)
                            <tr>
                                <td>{{ $pesertaJam->nomorRegistrasi}}</td>
                                <td>{{ (!empty($pesertaJam->nomorPeserta) ? $pesertaJam->nomorPeserta : '---')}}</td>
                                <td>{{ $pesertaJam->name}}</td>
                                <td>{{ $pesertaJam->statusBayar}}</td>
                                <td>{{ $pesertaJam->statusPeserta}}</td>
                                <td>
                                    @if ($pesertaJam->statusBayar == 'unpaid')
                                        <a class="button" href="/jejak/{{$pesertaJam->id}}/ubahstatus">Ganti</a>
                                    @else
                                        <label for="">Paid</label>
                                    @endif
                                </td>
                                <td>
                                    @if ($pesertaJam->statusBayar == 'unpaid')
                                        ---
                                    @else
                                        <a href="">Ubah</a> || 
                                        <a href="">Hapus</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('registeredScript')
    <script type="text/javascript">
        $(document).ready(function(){
            
        });
    </script>
@endsection