 @extends('admin.admin_master')

 @section('admin_main')
 <h2 class="font-semibold text-xl text-gray-800 leading-tight nounderline">
           Hello <b style="color:#4361ee">{{ Auth::user()->name }}</b>
           <b style="float:right; font-size:small;color:#b5179e">Total User (by paginator): <span style="padding: 5px 10px; border-radius: 50%;background-color: #f72585;color: white;">{{ count($users) }}</span> </b>
        </h2>
						<div class="row">
							<div class="col-xl-12 col-md-12">
                      <!-- Admin table -->
                      <div class="card card-default todo-table" id="todo" data-scroll-height="675">
                        <div class="card-header">
                          <h2>Admins</h2>
                        </div>
                        <div class="card-body">
                        <div class="panel panel-default">
                        <div class="panel-body table-responsive">
                            <table class="table table-hover" style="background-color: #6875f5;color:white">
                                <thead>
                                    <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col"> Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user_detail)
                                    <tr>
                                    <td>{{ $users->firstItem()+$loop->index }}</td>
                                    <td>{{ $user_detail-> name }}</td>
                                    <td>{{ $user_detail-> email}}</td>
                                    <td>{{ Carbon\Carbon::parse($user_detail-> created_at)->diffForHumans() }}</td>
                                    <td>{{ Carbon\Carbon::parse($user_detail-> updated_at)->diffForHumans() }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                        </div>
                        </div>
                            </div>
                          </div>
                        </div>
@endsection
