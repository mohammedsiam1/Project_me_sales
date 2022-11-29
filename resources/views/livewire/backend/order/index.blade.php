<div class="py-3 py-md-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="mb-4">My Order</h4>
      </div>
    <div class="card">
      
    <div class="card-body">
       
            <div class="row">
                <div class="col-md-3">
                    <label>Date</label>
                    <input type="date"wire:model="date" value="{{date('Y-m-d')}}" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Status</label>
                    <select wire:model="status" class="form-control">
                        <option value="">selected all status</option>
                        <option value="in progress">in progress</option>
                        <option value="completed">completed</option>
                        <option value="pending">pending</option>
                        <option value="out of delivery">out of delivery</option>
                    </select>
                </div>
            </div>
       
    </div>

      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>tracking</th>
              <th>fullname</th>
              <th>address</th>
              <th>status_message</th>
              <th>payment_mode </th>
              <th>created_at</th>
              <th>show </th>

            </tr>
          </thead>
          <tbody>
            @forelse($orders as $order)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$order->tracking_no}}</td>
              <td>{{$order->fullname}}</td>
              <td>{{$order->address}}</td>
              <td>{{$order->status_message}}</td>
              <td>{{$order->payment_mode}}</td>
              <td>{{$order->created_at->format('Y-m-d')}}</td>
              <td><a href="{{route('show.order.admin',$order->id ) }}" class="btn btn-outline-primary btn-sm">View</a></td>
            </tr>
            @empty
            <td colspan=7 style="text-align: center;">No Order Yet!</td>
            @endforelse
          </tbody>
        </table>
        <div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>