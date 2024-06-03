
<form action="{{ route('addJobs') }}" method="POST">
    @csrf
    <div class="job-item p-4 mb-4">
        <div class="row g-4">
            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                @php $firstImageDisplayed = false; @endphp
                <!-- Define a flag to track if the first image has been displayed -->
                @foreach ($orgs as $org)
                    <!-- Filter organizations to find the one associated with the current job -->
                    @if ($org->id === $data['org_id'] && ($org->text = 'logo'))
                        @foreach ($org->images as $img)
                            @if (!$firstImageDisplayed)
                                <!-- Check if the first image for this organization has been displayed -->
                                <img class="flex-shrink-0 img-fluid border rounded"
                                    src="{{ asset('storage/img/pictures/' . $img->image_path) }}"
                                    alt="" style="width: 80px; height: 80px;">
                                @php $firstImageDisplayed = true; @endphp
                                <!-- Set the flag to true after displaying the first image -->
                            @endif
                        @endforeach
                    @endif
                @endforeach
                <div class="text-start ps-4">
                    @auth
                        <input type="text" name="jobz[]" value="{{ $data['id'] }}" hidden>
                        <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                    @else
                        <input type="text" name="user_id" value="00000000" hidden>
                    @endauth
                    <h5 class="mb-3">{{ $data['job_title'] }}</h5>
                    <span class="text-truncate me-3"><i
                            class="fa fa-map-marker-alt text-danger me-2"></i>{{ $data['org_name'] }}</span>
                    <span class="text-truncate me-3"><i
                            class="far fa-clock text-danger me-2"></i>{{ $data['category_name'] }}</span>
                    <span class="text-truncate me-0"><i
                            class="far fa-money-bill-alt text-danger me-2"></i>Ksh
                        {{ $data['salary_range'] }}</span>
                </div>
            </div>
            <div
                class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                <div class="row">
                    <div class="mb-3 col">
                        <button class="btn btn-success" type="submit">Apply</button>
                    </div>
                    <div class="mb-3 col">
                        <a class="btn btn-success"
                            href="{{ route('jobDetails', $data['id']) }}">View</a>
                    </div>
                </div>
                <small class="text-truncate"><i
                        class="far fa-calendar-alt text-danger me-2"></i>Deadline
                    for application
                    {{ $data['deadline_date'] }}</small>
            </div>
        </div>
    </div>
</form>