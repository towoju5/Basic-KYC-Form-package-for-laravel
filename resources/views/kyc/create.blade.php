@extends('kyc-form::layout.app')

@section('code')
    <form action="{{ route('kyc.store') }}" method="post" id="kycForm" enctype="multipart/form-data">
        <div class="form">
            <div class="left-side">
                <div class="left-heading">
                    <h3>KYC VALIDATION</h3>
                </div>
                <div class="steps-content">
                    <h3>Step <span class="step-number">1</span></h3>
                    <p class="step-number-content active">Enter your personal information to get closer to
                        companies.</p>
                    <p class="step-number-content d-none">Get to know better by adding your diploma,certificate and
                        education life.</p>
                    <p class="step-number-content d-none">Help companies get to know you better by telling then
                        about your past experiences.</p>
                    <p class="step-number-content d-none">Add your profile piccture and let companies find youy
                        fast.</p>
                </div>
                <ul class="progress-bar">
                    <li class="active">Personal Information</li>
                    <li>Identity Verification</li>
                    {{-- <li>Additional Documents</li> --}}
                    {{-- <li>User Photo</li> --}}
                </ul>
            </div>
            <div class="right-side">
                <div class="main active step">
                    <small>
                        <a href="{{ url('/') }}">
                            <i class="fa fa-home"></i>
                        </a>
                    </small>
                    <div class="text">
                        <h2>Your Personal Information</h2>
                        @include('kyc-form::notifications')
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input required type="text" name="full_name" area-placeholder="Full Name" required
                                class="input-field mb-4">
                            <span>Full Name</span>
                        </div>
                        <div class="input-div">
                            <input required type="text" name="address" area-placeholder="Address" required
                                class="input-field mb-4">
                            <span>Address</span>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <label for="email">E-mail Address</label>
                            <input required id="email" type="email" name="email" required class="input-field mb-4">
                        </div>
                        <div class="input-div">
                            <label for="date_of_birth">Date of Birth</label>
                            <input required type="date" name="date_of_birth" id="date_of_birth"
                                placeholder="Date of Birth" required class="input-field mb-4">
                        </div>
                    </div>
                    <div class="buttons">
                        <button type="button" class="btn-next">Next Step</button>
                    </div>
                </div>
                <div class="main step">
                    <small>
                        <a href="{{ url('/') }}">
                            <i class="fa fa-home"></i>
                        </a>
                    </small>
                    <div class="text">
                        <h2>Identity Verification</h2>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <label for="id_number">ID Number</label>
                            <input required type="text" name="id_number" required placeholder="ID Number" class="input-field mb-4">
                        </div>
                        <div class="input-div">
                            <label for="id_document">I.D Document</label>
                            <input required id="id_document" type="file" name="id_document" accept="image/*" required class="input-field mb-4">
                        </div>
                    </div>
                    <div class="input-text">
                    </div>

                    <div class="input-text">
                        <div class="input-div">
                            <label for="proof_of_address">Proof of address</label>
                            <input required type="file" name="proof_of_address" accept="image/*" required
                                class="input-field mb-4">
                        </div>
                        <div class="input-div">
                            <label for="additional_document">Additional Document</label>
                            <input type="file" name="additional_document" id="additional_document" accept="image/*" class="input-field mb-4">
                        </div>
                    </div>
                    <div class="buttons button_space">
                        <button type="button" class="btn-prev btn-blue">Previous</button>
                        <button type="submit" class="btn-submit btn-blue">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        const form = document.getElementById('kycForm');
        const steps = Array.from(form.querySelectorAll('.step'));
        let currentStep = 0;

        function showStep(stepIndex) {
            steps.forEach((step, index) => {
                step.classList.toggle('active', index === stepIndex);
            });
        }

        function validateStep() {
            const fields = Array.from(steps[currentStep].querySelectorAll('input[required]'));
            let isValid = true;

            fields.forEach((field) => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('border', 'border-red-500');
                } else {
                    field.classList.remove('border', 'border-red-500');
                }
            });

            return isValid;
        }

        function navigateToStep(step) {
            if (validateStep()) {
                showStep(step);
            }
        }

        function navigateNext() {
            navigateToStep(currentStep + 1);
        }

        function navigatePrev() {
            navigateToStep(currentStep - 1);
        }

        const nextBtns = Array.from(form.querySelectorAll('.btn-next'));
        const prevBtns = Array.from(form.querySelectorAll('.btn-prev'));

        nextBtns.forEach((btn) => {
            btn.addEventListener('click', navigateNext);
        });

        prevBtns.forEach((btn) => {
            btn.addEventListener('click', navigatePrev);
        });
    </script>
@endsection
