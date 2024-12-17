document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const namaInput = document.getElementById('nama');
    const nimInput = document.getElementById('nim');
    const programStudiInput = document.getElementById('program_studi');
    const judulPenelitianInput = document.getElementById('judul_penelitian');
    const temaPenelitianInput = document.getElementById('tema_penelitian');
    const taOptions = document.querySelectorAll('input[name="ta_option[]"]');
    const dosenPembimbing1 = document.getElementById('dosen_pembimbing1');
    const dosenPembimbing2 = document.getElementById('dosen_pembimbing2');

    form.addEventListener('submit', (event) => {
        if (namaInput.value.trim() === '') {
            alert('Nama Mahasiswa harus diisi!');
            namaInput.focus();
            event.preventDefault();
            return;
        }

        const nimRegex = /^[0-9]{10}$/;
        if (!nimRegex.test(nimInput.value.trim())) {
            alert('NIM harus berupa angka dengan panjang 10 karakter!');
            nimInput.focus();
            event.preventDefault();
            return;
        }

        if (programStudiInput.value.trim() === '') {
            alert('Program Studi harus diisi!');
            programStudiInput.focus();
            event.preventDefault();
            return;
        }

        if (judulPenelitianInput.value.trim() === '') {
            alert('Judul Penelitian harus diisi!');
            judulPenelitianInput.focus();
            event.preventDefault();
            return;
        }

        if (temaPenelitianInput.value.trim() === '') {
            alert('Tema Penelitian harus diisi!');
            temaPenelitianInput.focus();
            event.preventDefault();
            return;
        }

        let taSelected = false;
        taOptions.forEach((checkbox) => {
            if (checkbox.checked) {
                taSelected = true;
            }
        });

        if (!taSelected) {
            alert('Minimal satu Pilihan Tugas Akhir (TA1/TA2) harus dipilih!');
            event.preventDefault();
            return;
        }

        if (dosenPembimbing1.value === '') {
            alert('Dosen Pembimbing 1 harus dipilih!');
            dosenPembimbing1.focus();
            event.preventDefault();
            return;
        }

        if (dosenPembimbing2.value === '') {
            alert('Dosen Pembimbing 2 harus dipilih!');
            dosenPembimbing2.focus();
            event.preventDefault();
            return;
        }

        if (dosenPembimbing1.value === dosenPembimbing2.value) {
            alert('Dosen Pembimbing 1 dan Dosen Pembimbing 2 tidak boleh sama!');
            dosenPembimbing2.focus();
            event.preventDefault();
            return;
        }
    });
});