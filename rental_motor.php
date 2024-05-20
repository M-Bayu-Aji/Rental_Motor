<?php

class RentalMotor {
    protected $nama;
    protected $lamaRental;
    protected $jenisMotor;
    protected $hargaPerHari = [
        'scoopy' => 70000,
        'beat' => 60000,
        'vario' => 80000,
        'nmax' => 100000
    ];
    protected $pajak = 10000;
    protected $diskonMember = 0.05;
    protected $hargaTotal;

    public function __construct($nama, $lamaRental, $jenisMotor) {
        $this->nama = $nama;
        $this->lamaRental = $lamaRental;
        $this->jenisMotor = $jenisMotor;
    }

    public function hitungHargaTotal() {
        $hargaPerHari = $this->hargaPerHari[$this->jenisMotor];
        $hargaSebelumPajak = $hargaPerHari * $this->lamaRental;
        $pajak = $this->pajak;
        $hargaSetelahPajak = $hargaSebelumPajak + $pajak;

        // Cek apakah pelanggan adalah member
        $member = ["bayu", "aji", "ana"]; // Daftar nama member
        $isMember = in_array(strtolower($this->nama), $member);

        if ($isMember) {
            $diskon = $hargaSetelahPajak * $this->diskonMember;
            $this->hargaTotal = $hargaSetelahPajak - $diskon;
            return "$this->nama berstatus menjadi member mendapatkan diskon sebesar 5% <br>Jenis motor yang dirental adalah $this->jenisMotor selama $this->lamaRental hari<br> dengan harga rental per-harinya: Rp. $hargaPerHari <br><br> Besar yang harus dibayarkan adalah Rp. ".number_format($this->hargaTotal, 0, ',', '.');
        } else {
            $this->hargaTotal = $hargaSetelahPajak;
            return "Pelanggan non-member. Jenis motor yang dirental adalah $this->jenisMotor selama $this->lamaRental hari dengan harga rental per-harinya: Rp. $hargaPerHari. <br><br> Besar yang harus dibayarkan adalah Rp. ".number_format($this->hargaTotal, 0, ',', '.');
        }
    }
}
?>