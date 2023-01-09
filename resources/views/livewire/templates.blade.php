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
        <div class="pagetitle">
            <h1>Template Table</h1>

            <div class="card">
                <div class="card-body">

                    <a class="btn btn-block btn-primary my-3" wire:click="addTemplate">{{$page_title}}</a>

                    <!--Table -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($templatecollection as $key => $template)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$template->name}}</td>
                                <td><button type="button" class="btn btn-primary"
                                        wire:click="editTemplate({{$template->id}})">Edit</button>
                                    <button type="button" class="btn btn-danger"
                                        wire:click="deleteTemplate({{$template->id}})">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table -->



                </div>
            </div>


            @else()
            <div class="row">
                <div class="col-lg-8">
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"> {{$page_title}}</h5>

                                <!-- Horizontal Form -->
                                <form wire:submit.prevent="StoreTemplate">
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Your Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" wire:model="name">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" wire:click="resetForm"
                                            class="btn btn-secondary">Reset</button>
                                    </div>
                                </form><!-- End Horizontal Form -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endif()
    </main>





</div>