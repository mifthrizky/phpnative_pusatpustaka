<?php
require_once '../layouts/header.php';

// Pagination setup
$items_per_page = 5;
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
        <div class="card card-modern px-4 py-4 bg-white mb-4" style="border: none; border-radius: 16px; box-shadow: 0 10px 40px rgba(0,0,0,0.08);">
            <!-- Header Section -->
            <div class=" align-items-center mb-2">
                <div>
                    <h4 class="mb-1" style="color: #1e293b; font-weight: 700; font-family: 'Barlow Semi Condensed', serif;">Data Kategori</h4>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap">
                <div class="input-group" style="max-width: 350px;">
                    <span class="input-group-text" style="border: none; background: #f8fafc;">
                        <i class="fas fa-search" style="color: #64748b;"></i>
                    </span>
                    <input type="text" class="form-control search-kategori" placeholder="Cari kategori..." style="border: none; background: #f8fafc; padding: 12px 16px;">
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKategoriModal">
                    <i class="fas fa-plus me-2"></i> Tambah Kategori
                </button>
            </div>

            <!-- Table Section -->
            <div class="table-wrapper" style="border-radius: 12px; overflow: hidden; border: 1px solid #e2e8f0;">
                <div class="table-responsive">
                    <table class="table table-modern mb-0">
                        <thead style="background: #f8fafc; color: black;">
                            <tr>
                                <th style="padding: 18px 20px; font-weight: 600; border: none;">No</th>
                                <th style="padding: 18px 20px; font-weight: 600; border: none;">Nama Kategori</th>
                                <th style="padding: 18px 20px; font-weight: 600; border: none; text-align: right; padding-right: 30px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = $offset + 1;
                            $stmt = $koneksi->query("SELECT * FROM kategori ORDER BY id_kategori ASC LIMIT $items_per_page OFFSET $offset");
                            while ($row = $stmt->fetch()):
                            ?>
                                <tr class="table-row-modern">
                                    <td style="padding: 16px 20px; color: #64748b; font-weight: 500; border-bottom: 1px solid #e2e8f0;"><?= $no++ ?></td>
                                    <td style="padding: 16px 20px; color: #1e293b; font-weight: 500; border-bottom: 1px solid #e2e8f0;"><?= htmlspecialchars($row['nama_kategori']) ?></td>
                                    <td style="padding: 16px 20px; border-bottom: 1px solid #e2e8f0; text-align: right;">
                                        <button type="button" class="btn btn-sm btn-action-edit me-2" data-bs-toggle="modal" data-bs-target="#modalEdit" data-id="<?= $row['id_kategori'] ?>" data-nama="<?= htmlspecialchars($row['nama_kategori']) ?>" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-action-delete" data-bs-toggle="modal" data-bs-target="#modalHapus" data-id="<?= $row['id_kategori'] ?>" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php
                            endwhile;
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Footer Pagination -->
                <div style="padding: 10px 20px; background: #f8fafc; border-top: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center;">
                    <div style="color: #64748b; font-size: 0.95rem;">
                        Menampilkan <span style="color: #1e293b; font-weight: 600;"><?= min($offset + 1, $total_records) ?></span> -
                        <span style="color: #1e293b; font-weight: 600;"><?= min($offset + $items_per_page, $total_records) ?></span>
                        dari <span style="color: #1e293b; font-weight: 600;"><?= $total_records ?></span> kategori
                    </div>

                    <nav>
                        <ul class="pagination mb-0">
                            <!-- Previous Button -->
                            <li>
                                <a class="pagination-link" href="?page=<?= $current_page - 1 ?>" <?= $current_page <= 1 ? 'style="pointer-events: none; opacity: 0.5;"' : '' ?>>
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>

                            <!-- Page Numbers -->
                            <?php
                            $start_page = max(1, $current_page - 2);
                            $end_page = min($total_pages, $current_page + 2);

                            if ($start_page > 1): ?>
                                <li><a class="pagination-link" href="?page=1">1</a></li>
                                <?php if ($start_page > 2): ?>
                                    <li><span class="pagination-link" style="cursor: default;">...</span></li>
                                <?php endif;
                            endif;

                            for ($page = $start_page; $page <= $end_page; $page++): ?>
                                <li>
                                    <a class="pagination-link <?= $page == $current_page ? 'active' : '' ?>" href="?page=<?= $page ?>">
                                        <?= $page ?>
                                    </a>
                                </li>
                                <?php endfor;

                            if ($end_page < $total_pages):
                                if ($end_page < $total_pages - 1): ?>
                                    <li><span class="pagination-link" style="cursor: default;">...</span></li>
                                <?php endif; ?>
                                <li><a class="pagination-link" href="?page=<?= $total_pages ?>"><?= $total_pages ?></a></li>
                            <?php endif; ?>

                            <!-- Next Button -->
                            <li>
                                <a class="pagination-link" href="?page=<?= $current_page + 1 ?>" <?= $current_page >= $total_pages ? 'style="pointer-events: none; opacity: 0.5;"' : '' ?>>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal Tambah Kategori -->
<div class="modal fade" id="tambahKategoriModal" tabindex="-1" aria-labelledby="tambahKategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border: none; border-radius: 16px; box-shadow: 0 20px 60px rgba(0,0,0,0.15);">
            <div class="modal-header" style="border-bottom: 1px solid #e2e8f0; padding: 24px;">
                <h5 class="modal-title" style="color: #1e293b; font-weight: 700; font-family: 'Barlow Semi Condensed', serif; font-size: 1.3rem;">Tambah Kategori Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 24px;">
                <form method="POST" action="action/kategori_action.php">
                    <input type="hidden" name="id_kategori" id="id_kategori">
                    <div class="mb-0">
                        <label for="namaKategori" class="form-label" style="color: #1e293b; font-weight: 600; margin-bottom: 10px;">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Contoh: Fiksi, Non-Fiksi, Referensi" style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 16px; font-size: 0.95rem;">
                    </div>
                    <div class="modal-footer" style="border-top: 1px solid #e2e8f0; padding: 16px 0; margin-top: 24px;">
                        <button type="button" class="btn" data-bs-dismiss="modal" style="color: #64748b; border: 1px solid #e2e8f0; border-radius: 8px; padding: 10px 20px;">Batal</button>
                        <button type="submit" class="btn" name="simpan" style="background: #1e40af; color: white; border: none; border-radius: 8px; padding: 10px 20px; font-weight: 600;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Kategori -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border: none; border-radius: 16px; box-shadow: 0 20px 60px rgba(0,0,0,0.15);">
            <div class="modal-header" style="border-bottom: 1px solid #e2e8f0; padding: 24px;">
                <h5 class="modal-title" style="color: #1e293b; font-weight: 700; font-family: 'Barlow Semi Condensed', serif; font-size: 1.3rem;">Edit Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="action/kategori_action.php">
                <div class="modal-body" style="padding: 24px;">
                    <input type="hidden" name="id_kategori" id="editIdKategori">
                    <div class="mb-0">
                        <label for="editNamaKategori" class="form-label" style="color: #1e293b; font-weight: 600; margin-bottom: 10px;">Nama Kategori</label>
                        <input type="text" class="form-control" id="editNamaKategori" name="nama_kategori" required style="border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 16px; font-size: 0.95rem;">
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 1px solid #e2e8f0; padding: 16px 10px; margin-top: 24px;">
                    <button type="button" class="btn" data-bs-dismiss="modal" style="color: #64748b; border: 1px solid #e2e8f0; border-radius: 8px; padding: 10px 20px;">Batal</button>
                    <button type="submit" class="btn" name="simpan" style="background: #f59e0b; color: white; border: none; border-radius: 8px; padding: 10px 20px; font-weight: 600;">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Hapus Kategori -->
<div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border: none; border-radius: 16px; box-shadow: 0 20px 60px rgba(0,0,0,0.15);">
            <div class="modal-header" style="border-bottom: 1px solid #e2e8f0; padding: 24px;">
                <h5 class="modal-title" style="color: black; font-weight: 700; font-family: 'Barlow Semi Condensed', serif; font-size: 1.3rem;">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="action/kategori_action.php">
                <div class="modal-body" style="padding: 20px;">
                    <input type="hidden" name="id_kategori" id="hapusIdKategori">
                    <p style="color: #64748b; margin: 0;">Apakah Anda yakin ingin menghapus kategori ini? Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="modal-footer" style="border-top: 1px solid #e2e8f0; padding: 16px 10px; margin-top: 24px;">
                    <button type="button" class="btn" data-bs-dismiss="modal" style="color: #64748b; border: 1px solid #e2e8f0; border-radius: 8px; padding: 10px 20px;">Batal</button>
                    <button type="submit" class="btn" name="hapus" style="background: #ef4444; color: white; border: none; border-radius: 8px; padding: 10px 20px; font-weight: 600;">Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // SweetAlert2 Notifications
        <?php if (isset($_SESSION['alert_type']) && isset($_SESSION['alert_msg'])): ?>
            const alertType = '<?= $_SESSION['alert_type'] ?>';
            const alertMsg = '<?= $_SESSION['alert_msg'] ?>';

            const alertConfig = {
                success: {
                    icon: 'success',
                    title: 'Berhasil!',
                    text: alertMsg,
                    confirmButtonColor: '#1e40af',
                    confirmButtonText: 'OK'
                },
                error: {
                    icon: 'error',
                    title: 'Gagal!',
                    text: alertMsg,
                    confirmButtonColor: '#ef4444',
                    confirmButtonText: 'OK'
                },
                warning: {
                    icon: 'warning',
                    title: 'Peringatan!',
                    text: alertMsg,
                    confirmButtonColor: '#f59e0b',
                    confirmButtonText: 'OK'
                }
            };

            if (alertConfig[alertType]) {
                Swal.fire(alertConfig[alertType]);
            }

            <?php
            // Clear session alerts after displaying
            unset($_SESSION['alert_type']);
            unset($_SESSION['alert_msg']);
            ?>
        <?php endif; ?>

        // Edit Button Handler
        const editButtons = document.querySelectorAll('.btn-action-edit');
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const nama = this.getAttribute('data-nama');

                document.getElementById('editIdKategori').value = id;
                document.getElementById('editNamaKategori').value = nama;
            });
        });

        // Delete Button Handler
        const deleteButtons = document.querySelectorAll('.btn-action-delete');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.getAttribute('data-id');

                document.getElementById('hapusIdKategori').value = id;

                // Show confirmation dialog
                const deleteModal = new bootstrap.Modal(document.getElementById('modalHapus'));
                deleteModal.show();
            });
        });

    });
</script>

<?php
require_once '../layouts/footer.php';
?>