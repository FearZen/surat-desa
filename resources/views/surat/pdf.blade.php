<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body { font-family: 'Times New Roman', Times, serif; font-size: 12pt; line-height: 1.5; color: #000; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 3px double #000; padding-bottom: 10px; }
        .header h2 { margin: 0; text-transform: uppercase; font-size: 16pt; }
        .header h3 { margin: 0; text-transform: uppercase; font-size: 14pt; }
        .header p { margin: 0; font-size: 10pt; font-style: italic; }
        
        .letter-info { margin-top: 20px; text-align: center; }
        .letter-info h4 { margin: 0; text-decoration: underline; text-transform: uppercase; }
        .letter-info p { margin: 0; }
        
        .content { margin-top: 30px; text-align: justify; }
        
        .footer { margin-top: 50px; }
        .signature { float: right; width: 250px; text-align: center; }
        .signature p { margin: 0; }
        .signature .space { height: 80px; }
        .signature .name { font-weight: bold; text-decoration: underline; text-transform: uppercase; }
        
        .clearfix::after { content: ""; clear: both; display: table; }
    </style>
</head>
<body>
    <div class="header">
        <h3>PEMERINTAH KABUPATEN INDONESIA</h3>
        <h3>KECAMATAN MAJU JAYA</h3>
        <h2>DESA SETIA BAKTI</h2>
        <p>Alamat: Jl. Pahlawan No. 123, Desa Setia Bakti, Kec. Maju Jaya, Kode Pos 12345</p>
    </div>

    <div class="letter-info">
        <h4>{{ $surat->template->nama_template }}</h4>
        <p>Nomor: {{ $surat->nomor_surat }}</p>
    </div>

    <div class="content">
        {!! nl2br(e($surat->isi_surat)) !!}
    </div>

    <div class="footer clearfix">
        <div class="signature">
            <p>Setia Bakti, {{ \Carbon\Carbon::parse($surat->tanggal_surat)->translatedFormat('d F Y') }}</p>
            <p>Kepala Desa Setia Bakti,</p>
            <div class="space"></div>
            <p class="name">BUDI SANTOSO, S.Sos</p>
        </div>
    </div>
</body>
</html>
