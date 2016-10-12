@extends('admin.layout')

@section('content')
<div class="container">
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
        </tr>
      </thead>
    </table>
  </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $(document).ready(function() {
    $('#members-table').DataTable( {
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
          {'data': 'status'},
        ]
    } );
  } );
</script>
@endpush
