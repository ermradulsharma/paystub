<div>
    <main id="main" class="main">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if($next==1)
        <div class="pageTitle">
            <h1>Colors Table</h1>

            <div class="card">
                <div class="card-body">

                    <div style="float:right;">
                        <a class="btn btn-block btn-primary my-3 " wire:click="addColor">{{$page_title}}</a>
                    </div>


                    <!--Table -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Code</th>
                                <th scope="col">Action</th>


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($colors as $key => $color)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$color->name}}</td>
                                <td>{{$color->code}}</td>
                                <td><button type="button" class="btn btn-primary"
                                        wire:click="editColor({{$color->id}})">Edit</button>
                                    <button type="button" class="btn btn-danger"
                                        wire:click="deleteColor({{$color->id}})">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table -->



                </div>
            </div>
        </div>
        @else()
        <div class="container">
            <section class="section  min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">


                            <div class="container">
                                <div class="card">
                                    <div class="card-header">
                                        <h2 class="card-title"> {{$page_title}}</h2>
                                    </div>
                                    <div class="card-body mt-5">


                                        <!-- Horizontal Form -->
                                        <form wire:submit.prevent="StoreColor">
                                            <div class="row mb-3">
                                                <label  class="col-sm-3 col-form-label">Color
                                                    Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="name" wire:model="name">
                                                    @error('name')
                                                    <div class="mt-3 text-danger">* {{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label  class="col-sm-3 col-form-label">Color
                                                    Code</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="code" wire:model="code">
                                                    @error('code')
                                                    <div class="mt-3 text-danger">* {{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="text-center mt-5">
                                                <button type="submit" class="btn btn-primary " style="float:right; ">Submit</button>
                                                <button type="reset" wire:click="resetForm"
                                                    class="btn btn-secondary  " style="float:right; margin-right: 12px;">Reset</button>
                                            </div>
                                        </form><!-- End Horizontal Form -->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

            </section>

        </div>
        @endif()

    </main>





</div>
