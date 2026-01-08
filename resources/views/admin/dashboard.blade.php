<x-admin.layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="heading">Dashboard</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}

    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-column h-100">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">Total Properties</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold">
                                            <span class="counter-value"
                                                data-target="{{ $totalProperties }}">{{ $totalProperties }}</span>
                                        </h2>
                                        <p class="mb-0 text-muted">
                                            <span class="badge bg-light text-primary mb-0">
                                                <i class="ri-home-line align-middle"></i> Total
                                            </span>
                                            Properties Listed
                                        </p>
                                    </div>
                                    <div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-primary-subtle rounded-circle fs-2">
                                                <i data-feather="home" class="text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">Available Properties</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold">
                                            <span class="counter-value"
                                                data-target="{{ $availableProperties }}">{{ $availableProperties }}</span>
                                        </h2>
                                        <p class="mb-0 text-muted">
                                            <span class="badge bg-light text-success mb-0">
                                                <i class="ri-check-double-line align-middle"></i> Available
                                            </span>
                                            Ready for Sale
                                        </p>
                                    </div>
                                    <div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-success-subtle rounded-circle fs-2">
                                                <i data-feather="check-circle" class="text-success"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-medium text-muted mb-0">Sold Properties</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold">
                                            <span class="counter-value"
                                                data-target="{{ $soldProperties }}">{{ $soldProperties }}</span>
                                        </h2>
                                        <p class="mb-0 text-muted">
                                            <span class="badge bg-light text-warning mb-0">
                                                <i class="ri-shopping-cart-2-line align-middle"></i> Sold
                                            </span>
                                            Transactions Completed
                                        </p>
                                    </div>
                                    <div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-warning-subtle rounded-circle fs-2">
                                                <i data-feather="shopping-bag" class="text-warning"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>



    @push('scripts')
    @endpush

</x-admin.layout>
