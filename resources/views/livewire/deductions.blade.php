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

        @if ($next == 1)
            <div class="pageTitle">
                <h1>Deduction Table</h1>

                <div class="card">
                    <div class="card-body">

                        <div style="float:right;">
                            <a class="btn btn-block btn-primary my-3 " wire:click="addDeduction">{{ $page_title }}</a>
                        </div>


                        <!--Table -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>State</th>
                                    <th>Title</th>
                                    <th>Percent</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($deductions as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->state }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->price }} %</td>
                                        <td>
                                            @if ($item->title != 'State Tax')
                                                <button type="button" class="btn btn-primary"
                                                    wire:click="editDeduction({{ $item->id }})">Edit</button>
                                            @endif
                                            {{-- @if ($confirming === $item->id)
                                    <button wire:click="deleteDeduction({{$item->id}})" class="btn btn-warning text-white w-32 ">Sure?</button>
                                    @else
                                    <button wire:click="confirmDelete({{ $item->id }})" class="btn btn-danger">Delete</button>
                                    @endif --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table -->
                    </div>
                </div>
            </div>
        @else
            <div class="container">
                <section class="section  min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">
                                <div class="container">
                                    <div class="card">
                                        <div class="card-header">
                                            <h2 class="card-title"> {{ $page_title }}</h2>
                                        </div>
                                        <div class="card-body mt-5">
                                            <!-- Horizontal Form -->
                                            <form wire:submit.prevent="StoreDeduction">
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">State</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-select" aria-label="Default select example"
                                                            type="text" wire:model="state">
                                                            <option selected="">Open this select State</option>
                                                            <option value="usa">USA</option>
                                                            <option value="canada">CANADA</option>
                                                            <option value="uk">UK</option>
                                                            <option value="global">GLOBAL</option>
                                                        </select>
                                                        @error('state')
                                                            <div class="mt-3 text-danger">* {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">Title
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="title"
                                                            {{ $title == 'State Tax' ? 'disabled' : '' }}
                                                            wire:model="title">
                                                        @error('title')
                                                            <div class="mt-3 text-danger">* {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">Price
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="price"
                                                            wire:model="price">
                                                        @error('price')
                                                            <div class="mt-3 text-danger">* {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="text-center mt-5">
                                                    <button type="submit" class="btn btn-primary "
                                                        style="float:right; ">Submit</button>
                                                    <button type="reset" wire:click="back()"
                                                        class="btn btn-secondary  "
                                                        style="float:right; margin-right: 12px;">Back</button>
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
