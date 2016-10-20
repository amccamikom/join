@extends('admin.layout')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12">
      <table id="members-table" class="table table-striped table-hover" width="100%">
        <thead class="thead-inverse">
          <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No. HP</th>
            <th>Divisi</th>
            <th>No. Reg</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="edit-member-modal" tabindex="-1" role="dialog" aria-labelledby="edit-member-modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="edit-member-form" method="post" action="{{ $helper->route('member.edit') }}">
        <input type="hidden" name="nim">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Edit Member</h4>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama/NIM</label>
            <div class="col-sm-10">
              <p class="form-control-static mb-0">
                <b class="member-nama"></b> / <b class="member-nim"></b>
              </p>
            </div>
          </div>
          <div class="form-group row">
            <label for="noReg" class="col-sm-2 col-control-label">No. Reg</label>
            <div class="col-sm-3">
              <input type="text" class="form-control member-reg" id="noReg" name="noReg">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2">Status</label>
            <div class="col-sm-10">
              <div class="form-check">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input member-status" name="status" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">LUNAS</span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $(document).ready(function() {
    var memberTable = $('#members-table').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
          "type": "post",
          "url": "{{ $helper->route('member.data') }}"
        },
        "columns": [
          {'data': 'nim'},
          {'data': 'nama'},
          {'data': 'email'},
          {'data': 'noHp'},
          {'data': 'divisi'},
          {'data': 'noReg'},
          {
            'data': 'status',
            'render': function(data, type, row, meta) {
              if (type === 'display') {
                return parseInt(data)
                  ? '<span class="tag tag-success">LUNAS</span>'
                  : '<span class="tag tag-default">BELUM</span>';
              }

              return data;
            }
          },
          {'data': 'aksi'},
        ]
    } );

    $('#edit-member-modal').on('show.bs.modal', function (e) {
      var btn   = $(e.relatedTarget),
          modal = $(this);

      modal.find("input[name='nim']").val(btn.data('nim'));
      modal.find('.member-nama').text(btn.data('nama'));
      modal.find('.member-nim').text(btn.data('nim'));
      modal.find('.member-reg').val(btn.data('reg'));
      modal.find('.member-status').prop('checked', parseInt(btn.data('status')));

      $('#edit-member-form').submit(function (e) {
        e.preventDefault();
        var $submitBtn = $(this).find("button[type='submit']"),
            url = this.action;

        $submitBtn.prop('disabled', true);

        $.post(url, $(this).serialize())
          .done(function(response) {
            $('#edit-member-modal').modal('hide');
          })
          .fail(function(response) {
            $('#edit-member-modal').modal('hide');
            alert('Terjadi kesalahan: '+response.message);
          })
          .always(function() {
            $submitBtn.prop('disabled', false);
            memberTable.ajax.reload();
          });
      });
    });
  } );
</script>
@endpush
