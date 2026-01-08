@extends('frontend.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.properties.index') }}"
                            class="text-decoration-none text-muted">Properties</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($property->title, 20) }}</li>
                </ol>
            </nav>

            <!-- Main Content -->
            <div class="row g-4">
                <!-- Left Side: Image & Content -->
                <div class="col-lg-8">
                    <div class="card overflow-hidden shadow mb-4">
                        <div class="position-relative">
                            @if ($property->image)
                                <img src="{{ asset('storage/' . $property->image) }}" class="img-fluid w-100"
                                    alt="{{ $property->title }}" style="min-height: 400px; object-fit: cover;">
                            @else
                                <img src="https://via.placeholder.com/800x500?text=No+Preview+Available"
                                    class="img-fluid w-100" alt="No Image">
                            @endif
                            <div class="position-absolute top-0 start-0 m-4">
                                <span class="badge bg-primary fs-6 shadow px-3 py-2">{{ $property->property_type }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h2 class="fw-bold mb-1 text-dark">{{ $property->title }}</h2>
                            <p class="text-muted fs-5 mb-0">
                                <i class="fas fa-map-marker-alt text-primary me-2"></i>{{ $property->location }}
                            </p>
                        </div>
                    </div>

                    <div class="card bg-white shadow-sm p-4 mb-4">
                        <h5 class="fw-bold mb-3 border-bottom pb-2">Description</h5>
                        <p class="text-muted lead" style="font-size: 1rem; line-height: 1.8;">
                            {{ $property->description }}
                        </p>
                    </div>

                    <div class="card bg-white shadow-sm p-4">
                        <h5 class="fw-bold mb-3 border-bottom pb-2">Property Features</h5>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <div class="d-flex align-items-center text-muted">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    <span>Status: <strong
                                            class="text-dark">{{ $property->status == 1 ? 'Available' : 'Sold' }}</strong></span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="d-flex align-items-center text-muted">
                                    <i class="fas fa-ruler-combined text-primary me-2"></i>
                                    <span>Area: <strong
                                            class="text-dark">{{ $property->area ? $property->area . ' sq ft' : 'N/A' }}</strong></span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="d-flex align-items-center text-muted">
                                    <i class="fas fa-bed text-primary me-2"></i>
                                    <span>Bedrooms: <strong
                                            class="text-dark">{{ $property->bedrooms ?? 'N/A' }}</strong></span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="d-flex align-items-center text-muted">
                                    <i class="fas fa-bath text-primary me-2"></i>
                                    <span>Bathrooms: <strong
                                            class="text-dark">{{ $property->bathrooms ?? 'N/A' }}</strong></span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="d-flex align-items-center text-muted">
                                    <i class="fas fa-calendar-alt text-primary me-2"></i>
                                    <span>Listed on: <strong
                                            class="text-dark">{{ $property->created_at->format('M d, Y') }}</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Pricing & Info -->
                <div class="col-lg-4">
                    <div class="card shadow-sm mb-4 sticky-top" style="top: 100px;">
                        <div class="card-body p-4">
                            <div class="mb-4">
                                <p class="text-muted small text-uppercase fw-bold mb-1">Price</p>
                                <h2 class="text-primary fw-bold display-6 mb-0">${{ number_format($property->price) }}</h2>
                            </div>

                            <div class="d-grid gap-2">
                                <button class="btn btn-primary btn-lg"><i class="fas fa-phone-alt me-2"></i> Contact
                                    Agent</button>
                                <button class="btn btn-outline-secondary btn-lg"><i class="far fa-envelope me-2"></i> Email
                                    Inquiry</button>
                            </div>

                            <div class="mt-4 pt-3 border-top text-center">
                                <small class="text-muted">Property ID: #{{ $property->id }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
