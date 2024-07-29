<div class="offcanvas offcanvas-end" tabindex="-1" id="leadDetailsOffcanvas" aria-labelledby="leadDetailsOffcanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="leadDetailsOffcanvasLabel">Lead Details</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form id="leadDetailsForm">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="lead_full_name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="lead_full_name" name="full_name" readonly>
            </div>
            <div class="mb-3">
                <label for="lead_country" class="form-label">Country</label>
                <input type="text" class="form-control" id="lead_country" name="country" readonly>
            </div>
            <div class="mb-3">
                <label for="lead_time_zone" class="form-label">Time Zone</label>
                <input type="text" class="form-control" id="lead_time_zone" name="time_zone" readonly>
            </div>
            <div class="mb-3">
                <label for="lead_gender" class="form-label">Gender</label>
                <input type="text" class="form-control" id="lead_gender" name="gender" readonly>
            </div>
            <div class="mb-3">
                <label for="lead_email" class="form-label">Email</label>
                <input type="email" class="form-control" id="lead_email" name="email" readonly>
            </div>
            <div class="mb-3">
                <label for="lead_phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="lead_phone" name="phone" readonly>
            </div>
            <div class="mb-3">
                <label for="lead_status" class="form-label">Status</label>
                <select class="form-select" id="lead_status" name="status_id">
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="lead_source" class="form-label">Source</label>
                <input type="text" class="form-control" id="lead_source" name="source" readonly>
            </div>
            <div class="mb-3">
                <label for="lead_agent" class="form-label">Agent</label>
                <input type="text" class="form-control" id="lead_agent" name="agent" readonly>
            </div>
            <div class="mb-3">
                <label for="lead_reminder" class="form-label">Reminder Date and Time</label>
                <input type="datetime-local" class="form-control" id="lead_reminder" name="reminder_at">
            </div>
            <div class="mb-3">
                <label for="lead_note" class="form-label">Note</label>
                <textarea class="form-control" id="lead_note" name="note" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</div>