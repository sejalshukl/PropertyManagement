@extends('frontend.layout')

@section('content')
    <div class="row">
        <!-- Filters Sidebar -->
        <div class="col-lg-3 mb-4">
            <div class="card bg-white p-3 sticky-top" style="top: 90px; z-index: 1000;">
                <h5 class="card-title mb-3 fw-bold text-uppercase fs-6 text-muted">Filter Properties</h5>
                <form action="{{ route('frontend.properties.index') }}" method="GET">

                    <div class="mb-3">
                        <label class="form-label text-muted fs-7 fw-semibold">Search properties</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i
                                    class="fas fa-search text-muted"></i></span>
                            <input type="text" name="title" class="form-control bg-light border-start-0"
                                value="{{ request('title') }}" placeholder="Search by title...">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted fs-7 fw-semibold">Location</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i
                                    class="fas fa-map-marker-alt text-muted"></i></span>
                            <input type="text" name="location" class="form-control bg-light border-start-0"
                                value="{{ request('location') }}" placeholder="City, State...">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted fs-7 fw-semibold">Property Type</label>
                        <select name="property_type" class="form-select bg-light">
                            <option value="">All Types</option>
                            <option value="Apartment" {{ request('property_type') == 'Apartment' ? 'selected' : '' }}>
                                Apartment</option>
                            <option value="House" {{ request('property_type') == 'House' ? 'selected' : '' }}>House
                            </option>
                            <option value="Commercial" {{ request('property_type') == 'Commercial' ? 'selected' : '' }}>
                                Commercial</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted fs-7 fw-semibold">Price Range</label>
                        <div class="row g-1">
                            <div class="col-6">
                                <input type="number" name="min_price" class="form-control bg-light" placeholder="Min"
                                    value="{{ request('min_price') }}">
                            </div>
                            <div class="col-6">
                                <input type="number" name="max_price" class="form-control bg-light" placeholder="Max"
                                    value="{{ request('max_price') }}">
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary shadow-sm">
                            <i class="fas fa-filter me-1"></i> Apply Filter
                        </button>
                        <a href="{{ route('frontend.properties.index') }}" class="btn btn-light text-muted">
                            Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Properties Grid -->
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0 fw-bold">Available Properties</h4>
                <span class="text-muted fs-6">{{ $properties->total() }} results found</span>
            </div>

            <div class="row">
                @forelse($properties as $property)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 property-card overflow-hidden">
                            <div class="position-relative">
                                <a href="{{ route('frontend.properties.show', $property->id) }}">
                                    @if ($property->image)
                                        <img src="{{ asset('storage/' . $property->image) }}" class="card-img-top"
                                            alt="{{ $property->title }}" style="height: 220px; object-fit: cover;">
                                    @else
                                        <img src="https://via.placeholder.com/300x220?text=No+Image" class="card-img-top"
                                            alt="No Image">
                                    @endif
                                </a>
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge bg-white text-dark shadow-sm">{{ $property->property_type }}</span>
                                </div>
                                <div class="position-absolute bottom-0 start-0 m-3">
                                    <span class="badge bg-primary shadow-sm">${{ number_format($property->price) }}</span>
                                </div>
                            </div>

                            <div class="card-body p-3">
                                <div class="mb-2 text-muted small">
                                    <i class="fas fa-map-marker-alt me-1 text-primary"></i>
                                    {{ Str::limit($property->location, 25) }}
                                </div>
                                <h5 class="card-title fw-bold mb-2">
                                    <a href="{{ route('frontend.properties.show', $property->id) }}"
                                        class="text-dark text-decoration-none stretched-link">
                                        {{ Str::limit($property->title, 40) }}
                                    </a>
                                </h5>
                                <p class="card-text text-muted small mb-3">
                                    {{ Str::limit($property->description, 60) }}
                                </p>
                                <div class="d-flex justify-content-between mb-3 text-muted small">
                                    <span><i class="fas fa-bed me-1"></i> {{ $property->bedrooms ?? '-' }} Beds</span>
                                    <span><i class="fas fa-bath me-1"></i> {{ $property->bathrooms ?? '-' }} Baths</span>
                                    <span><i class="fas fa-ruler-combined me-1"></i> {{ $property->area ?? '-' }}
                                        sqft</span>
                                </div>
                            </div>
                            <div class="card-footer bg-white border-top-0 pt-0 pb-3">
                                <div class="d-flex justify-content-between align-items-center text-muted small">
                                    <span><i class="far fa-clock me-1"></i>
                                        {{ $property->created_at->diffForHumans() }}</span>
                                    <span class="text-primary fw-medium">View Details <i
                                            class="fas fa-arrow-right ms-1"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card p-5 text-center">
                            <div class="mb-3">
                                <i class="fas fa-search fa-3x text-muted opacity-50"></i>
                            </div>
                            <h5 class="text-muted">No properties found matching your criteria.</h5>
                            <p class="text-muted mb-0">Try adjusting your filters or <a
                                    href="{{ route('frontend.properties.index') }}">clear all filters</a>.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $properties->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
