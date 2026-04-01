<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container py-4">
        <h2>Nilai Mahasiswa</h2>
        <div class="col-md-10">

            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>TN</th>
                        <th>NH</th>
                        <th>ipk</th>
                        <th>keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswa as $mhs)
                        @php
                            $uts = $mhs['uts'];
                            $uas = $mhs['uas'];
                            $tn = 0.4 * $uts + 0.6 * $uas;
                            $nh = '';
                            $ipk = 0;
                            $keterangan = '';

                             if ($tn >= 85) {
                                    $nh = 'A'; $ipk = 4.00;
                                } elseif ($tn >= 80) {
                                    $nh = 'A-'; $ipk = 3.75;
                                } elseif ($tn >= 75) {
                                    $nh = 'B+'; $ipk = 3.50;
                                } elseif ($tn >= 70) {
                                    $nh = 'B'; $ipk = 3.25;
                                } elseif ($tn >= 65) {
                                    $nh = 'B-'; $ipk = 3.00;
                                } elseif ($tn >= 60) {
                                    $nh = 'C+'; $ipk = 2.75;
                                } elseif ($tn >= 55) {
                                    $nh = 'C'; $ipk = 2.50;
                                } elseif ($tn >= 50) {
                                    $nh = 'C-'; $ipk = 2.25;
                                } elseif ($tn >= 45) {
                                    $nh = 'D'; $ipk = 2.00;
                                } 
                            
                                 // Tambahan kolom keterangan berdasarkan mutu (IPK)
                                if ($ipk >= 3.5) {
                                    $keterangan = 'Dengan Pujian';
                                } elseif ($ipk >= 3.0 && $ipk < 3.5) {
                                    $keterangan = 'Sangat Memuaskan';
                                } else {
                                    $keterangan = 'Memuaskan';
                                }
                        @endphp
                        <tr>
                            <td>{{ $mhs['nama'] }}</td>
                            <td>{{ $mhs['nim'] }}</td>
                            <td>{{ $uts }}</td>
                            <td>{{ $uas }}</td>
                            <td>{{ $tn }}</td>
                            <td>{{ $nh }}</td>
                            <td>{{ $ipk }}</td>
                            <td>{{ $keterangan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
