@extends('layouts.backend.app')

@section('head')
@include('layouts.backend.partials.headersection',['title'=>'Manual Gateway List'])
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-lg-12">
                  <div class="add-new-btn">
                      <a href="{{ route('admin.manual_gateway.create') }}" class="btn btn-primary float-right">{{ __('Add New Deposit') }}</a>
                  </div>
              </div>
            </div>
            @if (Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped" id="table-2">
                  <thead>
                    <tr>
                      <th>{{ __('Name') }}</th>
                      <th>{{ __('Logo') }}</th>
                      <th>{{ __('Maximum Limit') }}</th>
                      <th>{{ __('Created At') }}</th>
                      <th>{{ __('Action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($manualGateways as $manualGateway)   
                      <tr>
                        <td>{{ $manualGateway->name }}</td>
                        <td class="align-middle"> 
                            <img width="80" src="{{ asset($manualGateway->logo) }}" alt="{{ $manualGateway->logo }}">
                        </td>
                        <td>{{ $manualGateway->deposit_max }}</td>
                        <td>{{ date('d-m-Y', strtotime($manualGateway->created_at)) }}</td>
                        <td>
                          <div class="dropdown d-inline">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{ __('Action') }}
                            </button>   
                            <div class="dropdown-menu">
                              <a class="dropdown-item has-icon" href="{{ route('admin.manual_gateway.edit', $manualGateway->id) }}"><i class="fa fa-edit"></i>{{ __('Edit') }}</a>
                              <a class="dropdown-item has-icon delete-confirm" href="javascript:void(0)" data-id={{ $manualGateway->id }}><i class="fa fa-trash"></i>{{ __('Delete') }}</a>
                              <!-- Delete Form -->
                              <form class="d-none" id="delete_form_{{ $manualGateway->id }}" action="{{ route('admin.manual_gateway.delete', $manualGateway->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              </form>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              <div class="float-right">
                {{ $manualGateways->links('vendor.pagination.bootstrap-4') }}
              </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('backend/admin/assets/js/sweetalert2.all.min.js') }}"></script>
@endpush
