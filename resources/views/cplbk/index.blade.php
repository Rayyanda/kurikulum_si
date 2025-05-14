@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Matrix CPL-BK</h1>

    <div class="card shadow mb-4 m-2">
      <div class="card-body">
          <div class="d-flex justify-content-start mb-3">
              @can('update.cpl-bk')
              <a href="{{ route('cplbk.edit') }}" class="btn btn-primary mr-2">Edit Matrix</a>
              @endcan
              <a href="{{ route('pdf.cplbk') }}" class="btn btn-primary">Cetak PDF</a>
          </div>


          <div class="table-responsive p-2">
              <table id="dataTable" class="table table-bordered">
                  <thead>
                      <tr>
                          <th>CPL</th>
                          @foreach($bks as $bk)
                              <th>{{ $bk->kode }}</th>
                          @endforeach
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($cpls as $cpl)
                          <tr>
                              <td>{{ $cpl->code }}</td>
                              @foreach($bks as $bk)
                                  <td>
                                      @if($matrix->where('cpl_id', $cpl->id)->where('bk_id', $bk->id)->isNotEmpty())
                                          <span>&#x2714;</span>
                                      @endif
                                  </td>
                              @endforeach
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
    </div>
</div>
@endsection
