<div class="row">
    @foreach ($data as $contact)
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <img src="{{ asset('storage/contact/' . $contact->image) }}" class="card-img-top" style="height: 180px;"
                    alt="{{ $contact->image }}">
                <div class="card-header">
                    <h5 class="card-title">{{ $contact->nama }}</h5>
                    <div class="card-tools">
                        <a href="{{ route('customer.show', [$contact->id]) }}" class="btn btn-tool">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('customer.edit', [$contact->id]) }}" class="btn btn-tool">
                            <i class="fas fa-pen"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
