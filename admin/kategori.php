<?php
require_once '../layouts/header.php';

// Pagination setup
$items_per_page = 10;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$current_page = max(1, $current_page);

// Get total records
$total_result = $koneksi->query("SELECT COUNT(*) as total FROM kategori");
$total_row = $total_result->fetch();
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $items_per_page);

// Ensure current page doesn't exceed total pages
$current_page = min($current_page, max(1, $total_pages));

// Calculate offset
$offset = ($current_page - 1) * $items_per_page;
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
                        $no = $offset + 1;
                        $stmt = $koneksi->query("SELECT * FROM kategori ORDER BY id_kategori ASC LIMIT $items_per_page OFFSET $offset");
                        while ($row = $stmt->fetch()):
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

            <!-- Pagination Container -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <!-- Page Info (Left) -->
                <div class="text-muted small">
                    Halaman <?= $current_page ?> dari <?= max(1, $total_pages) ?> | Total: <?= $total_records ?> kategori
                </div>

                <!-- Pagination (Right) -->
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm mb-0">
                        <!-- Previous Button -->
                        <li class="page-item <?= $current_page <= 1 ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $current_page - 1 ?>" <?= $current_page <= 1 ? 'onclick="return false;"' : '' ?>>
                                ← Sebelumnya
                            </a>
                        </li>

                        <!-- Page Numbers -->
                        <?php
                        $start_page = max(1, $current_page - 2);
                        $end_page = min($total_pages, $current_page + 2);

                        if ($start_page > 1): ?>
                            <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
                            <?php if ($start_page > 2): ?>
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            <?php endif;
                        endif;

                        for ($page = $start_page; $page <= $end_page; $page++): ?>
                            <li class="page-item <?= $page == $current_page ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $page ?>"><?= $page ?></a>
                            </li>
                            <?php endfor;

                        if ($end_page < $total_pages):
                            if ($end_page < $total_pages - 1): ?>
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            <?php endif; ?>
                            <li class="page-item"><a class="page-link" href="?page=<?= $total_pages ?>"><?= $total_pages ?></a></li>
                        <?php endif; ?>

                        <!-- Next Button -->
                        <li class="page-item <?= $current_page >= $total_pages ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $current_page + 1 ?>" <?= $current_page >= $total_pages ? 'onclick="return false;"' : '' ?>>
                                Selanjutnya →
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
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
                <form method="POST" action="action/kategori_action.php">
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
            <form method="POST" action="action/kategori_action.php">
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
            <form method="POST" action="action/kategori_action.php">
                <div class="modal-body">
                    <input type="hidden" name="id_kategori" id="hapusIdKategori">
                    <p>Apakah Anda yakin ingin menghapus kategori ini?</p>
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