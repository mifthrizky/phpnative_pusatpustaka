<?php
require_once '../layouts/header.php';

// Function Form Progress
if (isset($_POST['simpan'])) {
    $nama_kategori = mysqli_real_escape_string($koneksi, $_POST['nama_kategori']);
    $id_kategori = $_POST['id_kategori'];

    if ($id_kategori == "") {
        $query = "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')";
    } else {
        $query = "UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = $id_kategori";
    }

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
            alert('Data kategori berhasil disimpan');
            window.location.href = 'kategori.php';
          </script>";
        exit;
    } else {
        echo "<script>alert('Error: " . mysqli_error($koneksi) . "');</script>";
    }
}

// Function Delete
if (isset($_POST['hapus'])) {
    $id_kategori = $_POST['id_kategori'];
    $query = "DELETE FROM kategori WHERE id_kategori = $id_kategori";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>
            alert('Data kategori berhasil dihapus');
            window.location.href = 'kategori.php';
          </script>";
        exit;
    } else {
        echo "<script>alert('Error: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<div class="row">
    <div class="col-12">
        <div class="card card-custom p-4 bg-white mb-4">
            <!-- Button Atas Tabel -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahKategoriModal">
                    + Tambah Kategori
                </button>
                <div class="w-25">
                    <input type="text" class="form-control" placeholder="Cari Kategori...">
                </div>
            </div>

            <!-- Tabel Read Kategori -->
            <div class="table-responsive border rounded overflow-hidden mb-3">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="15%">ID Kategori</th>
                            <th>Nama Kategori</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori DESC");
                        while ($row = mysqli_fetch_assoc($query)):
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama_kategori'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#modalEdit" data-id="<?= $row['id_kategori'] ?>" data-nama="<?= $row['nama_kategori'] ?>">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger btn-hapus" data-bs-toggle="modal" data-bs-target="#modalHapus" data-id="<?= $row['id_kategori'] ?>">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        <?php
                        endwhile;
                        ?>
                    </tbody>
                </table>
            </div>

            <nav>
                <ul class="pagination justify-content-end mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Modal Tambah Kategori -->
<div class="modal fade" id="tambahKategoriModal" tabindex="-1" aria-labelledby="tambahKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKategoriModalLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <input type="hidden" name="id_kategori" id="id_kategori">
                    <div class="mb-3">
                        <label for="namaKategori" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan nama kategori">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Kategori -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Edit Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_kategori" id="editIdKategori">
                    <div class="mb-3">
                        <label for="editNamaKategori" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="editNamaKategori" name="nama_kategori" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning" name="simpan">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Hapus Kategori -->
<div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="modalHapusLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_kategori" id="hapusIdKategori">
                    <p>Apakah Anda yakin ingin menghapus kategori ini? Data yang dihapus tidak dapat dikembalikan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger" name="hapus">Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.btn-edit');
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const nama = this.getAttribute('data-nama');

                document.getElementById('editIdKategori').value = id;
                document.getElementById('editNamaKategori').value = nama;
            });
        });

        const deleteButtons = document.querySelectorAll('.btn-hapus');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');

                document.getElementById('hapusIdKategori').value = id;
            });
        });

    });
</script>

<?php
require_once '../layouts/footer.php';
?>