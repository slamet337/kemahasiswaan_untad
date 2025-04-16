<script type="text/javascript">
  let baseUrl = '<?= base_url() ?>';
  let route = location.pathname.substring(location.pathname.lastIndexOf('/') + 1);

  $(function () {

    // select2bs4 theme
    // jurusan
    $('.select-fakultas').select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih Fakultas',
    })
    $('.select-nim').select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih Stambuk',
    })
    $('.select-kegiatan').select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih Kegiatan',
    })
    $('.select-jurusan').select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih Jurusan',
    })
    // prodi
    $('.select-prodi').select2({
      theme: 'bootstrap4',
      placeholder: "Pilih Program Studi"
    })
    
    // datatable
    $('.tabel-data').DataTable({
      'responsive': {
        'details': {
          'type': 'column',
          'targets': 'tr'
        },
      },
      'autoWidth': false,
      'columnDefs': [
        {
          'orderable': false,
          'targets': -1
        },
        {
          'responsivePriority': 2,
          'targets': -1
        },
        {
          'className': 'control p-3',
          'orderable': false,
          'searchable': false,
          'targets':   0
        },
        {
          'className': 'align-middle',
          'targets': '_all'
        },
      ],
      'order': [1, 'asc'],
    });
    
    $('th.align-middle').removeClass('align-middle');

    // Prodi select in edit
    let id = $('.select-jurusan').val();
    let options = '<option></option>';

    <?php
      if (isset($prodi_all) && isset($mahasiswa)) {
        foreach ($prodi_all as $p_data) {
    ?>
          if ( <?= ($p_data->jurusan_id == NULL) ? '0' : $p_data->jurusan_id ?> == id ) {
            options += '<option value = "<?= $p_data->id ?>" <?= ($p_data->id == $mahasiswa->prodi_id) ? 'selected="selected"' : ''; ?> >(<?= $p_data->kode_prodi ?>) <?= $p_data->nama_prodi ?></option>';
          }
    <?php 
        } 
      }
    ?>

    $('.select-prodi').html(options);

    // Prodi Select Data
    $('.select-jurusan').change( function() {
      let id = $(this).val();
      let options = '<option></option>';

      <?php
        if (isset($prodi_all)) {
          foreach ($prodi_all as $p_data) {
      ?>
            if ( <?= ($p_data->jurusan_id == NULL) ? '0' : $p_data->jurusan_id ?> == id ) {
              options += '<option value = "<?= $p_data->id ?>" <?= ($p_data->id == set_value('jurusan_id')) ? 'selected="selected"' : ''; ?> >(<?= $p_data->kode_prodi ?>) <?= $p_data->nama_prodi ?></option>';
            }
      <?php 
          } 
        }
      ?>
        
      $('.select-prodi').html(options);

    });

    // Toastr
    let msg = "<?= ($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>";
    if (msg != '') {
      toastr.success(msg);
    }
    <?php $this->session->set_flashdata('message', ''); ?>

    // Sweet Alert
    $('a.delete-btn').click(function(){
      let row = $(this).closest('tr');
      let id = row.attr('id');

      swal(
        {
          title: "Perhatian!",
          text: "Anda akan menghapus data ini",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Hapus!",
          cancelButtonText: "Batal!",
          closeOnConfirm: true,
          closeOnCancel: true
        },

        function(isConfirm) {
          if (isConfirm) {
            $.ajax({
              url: baseUrl+route+'/delete/'+id,
              type: 'DELETE',
              error: function() {
                alert('Gagal!');
              },
              success: function(data) {
                location.replace(location.pathname);
              }
            });
          } 
        }
      );
    
      });



    
  });
</script>