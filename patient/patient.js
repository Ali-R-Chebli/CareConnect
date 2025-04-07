        // Enable tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        // Rating stars interaction
        document.querySelectorAll('.rating-star').forEach(star => {
            star.addEventListener('click', function() {
                const rating = parseInt(this.getAttribute('data-rating'));
                document.getElementById('ratingValue').value = rating;

                // Update star display
                document.querySelectorAll('.rating-star').forEach((s, index) => {
                    if (index < rating) {
                        s.classList.add('active');
                    } else {
                        s.classList.remove('active');
                    }
                });
            });

            star.addEventListener('mouseover', function() {
                const rating = parseInt(this.getAttribute('data-rating'));

                document.querySelectorAll('.rating-star').forEach((s, index) => {
                    if (index < rating) {
                        s.classList.add('hover');
                    } else {
                        s.classList.remove('hover');
                    }
                });
            });

            star.addEventListener('mouseout', function() {
                document.querySelectorAll('.rating-star').forEach(s => {
                    s.classList.remove('hover');
                });
            });
        });

        // Edit profile button
        document.getElementById('editProfileBtn').addEventListener('click', function() {
            const form = document.getElementById('profileForm');
            const inputs = form.querySelectorAll('input[readonly], textarea[readonly]');
            const actions = document.getElementById('profileFormActions');

            inputs.forEach(input => {
                input.removeAttribute('readonly');
            });

            actions.classList.remove('d-none');
        });

        // Form submissions
        document.getElementById('serviceRequestForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Service request submitted successfully!');
            // In a real app, you would send this to your PHP backend
        });

        document.getElementById('reportForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Issue report submitted successfully! Our team will review it shortly.');
            // In a real app, you would send this to your PHP backend
        });

        document.getElementById('ratingForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const rating = document.getElementById('ratingValue').value;
            if (rating === '0') {
                alert('Please select a rating');
                return;
            }
            alert('Thank you for your rating!');
            // In a real app, you would send this to your PHP backend
            bootstrap.Modal.getInstance(document.getElementById('ratingModal')).hide();
        });

        // Simulate clicking on rating modal when "Rate" button is clicked in requests table
        document.querySelectorAll('.btn-outline-success').forEach(btn => {
            if (btn.textContent.trim() === 'Rate') {
                btn.addEventListener('click', function() {
                    const ratingModal = new bootstrap.Modal(document.getElementById('ratingModal'));
                    ratingModal.show();
                });
            }
        });

        // for the log out
        document.getElementById('logoutBtn').addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default link behavior
            var logoutModal = new bootstrap.Modal(document.getElementById('logoutConfirmModal'));
            logoutModal.show();
        });

        document.getElementById('detectAddressBtn').addEventListener('click', function() {
            const addressField = document.getElementById('serviceAddress');

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    async function(position) {
                            try {
                                // Reverse geocoding using Nominatim (OpenStreetMap)
                                const response = await fetch(
                                    `https://nominatim.openstreetmap.org/reverse?format=json&lat=${position.coords.latitude}&lon=${position.coords.longitude}`
                                );
                                const data = await response.json();

                                if (data.address) {
                                    const address = [
                                        data.address.road,
                                        data.address.house_number,
                                        data.address.city || data.address.town,
                                        data.address.state,
                                        data.address.postcode
                                    ].filter(Boolean).join(', ');

                                    addressField.value = address;
                                } else {
                                    throw new Error('Address not found');
                                }
                            } catch (error) {
                                addressField.classList.add('is-invalid');
                                console.error("Geocoding error:", error);
                            }
                        },
                        function(error) {
                            addressField.classList.add('is-invalid');
                            console.error("Geolocation error:", error.message);
                        }
                );
            } else {
                addressField.classList.add('is-invalid');
                console.error("Geolocation not supported");
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Next step functionality
            document.querySelectorAll('.next-step').forEach(button => {
                button.addEventListener('click', function() {
                    const currentStep = this.closest('.step');
                    const nextStep = currentStep.nextElementSibling;

                    currentStep.style.display = 'none';
                    nextStep.style.display = 'block';
                });
            });

            // Previous step functionality
            document.querySelectorAll('.prev-step').forEach(button => {
                button.addEventListener('click', function() {
                    const currentStep = this.closest('.step');
                    const prevStep = currentStep.previousElementSibling;

                    currentStep.style.display = 'none';
                    prevStep.style.display = 'block';
                });
            });

            // Your existing address detection code
            document.getElementById('detectAddressBtn').addEventListener('click', function() {
                // Your geolocation code here
            });
        });


        document.getElementById('profileImageUpload').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('profileImagePreview');
            const errorElement = document.getElementById('uploadError');

            // Reset error message
            errorElement.style.display = 'none';

            // Validate file
            if (!file) return;

            if (file.size > 5 * 1024 * 1024) { // 5MB limit
                errorElement.textContent = 'File is too large (max 5MB)';
                errorElement.style.display = 'block';
                return;
            }

            if (!['image/jpeg', 'image/png'].includes(file.type)) {
                errorElement.textContent = 'Only JPG/PNG files allowed';
                errorElement.style.display = 'block';
                return;
            }

            // Preview image
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;

                // Here you would typically upload the image to your server
                // uploadImageToServer(file);
            };
            reader.readAsDataURL(file);
        });

        // This function would handle the actual upload to your server
        function uploadImageToServer(file) {
            const formData = new FormData();
            formData.append('profileImage', file);

            // Example using fetch API
            fetch('/upload-profile-image', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Upload successful:', data);
                    // Handle successful upload (e.g., show success message)
                })
                .catch(error => {
                    console.error('Upload error:', error);
                    // Handle upload error
                });
        }



        // Add this to your existing script section
        document.querySelectorAll('.view-profile-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const card = this.closest('.card');
                const nurseData = {
                    id: card.dataset.nurseId,
                    name: card.querySelector('.card-title').textContent,
                    specialty: card.querySelector('.text-muted').textContent,
                    photo: card.querySelector('img').src,
                    rating: 4.5, // Would normally come from data attributes
                    reviews: 28,
                    // Add more data points as needed
                };

                // Populate the modal
                populateNurseProfile(nurseData);

                // Show the modal
                new bootstrap.Modal(document.getElementById('nurseProfileModal')).show();
            });
        });

        function populateNurseProfile(data) {
            // Basic Info
            document.getElementById('nurseProfileName').textContent = data.name;
            document.getElementById('nurseProfileSpecialty').textContent = data.specialty;
            document.getElementById('nurseProfilePhoto').src = data.photo;

            // Ratings
            const ratingContainer = document.getElementById('nurseProfileRating');
            ratingContainer.innerHTML = '';
            for (let i = 1; i <= 5; i++) {
                const star = document.createElement('i');
                star.className = `fas fa-star ${i <= Math.floor(data.rating) ? 'text-warning' : 
                      (i === Math.ceil(data.rating) && data.rating % 1 > 0 ? 'fa-star-half-alt text-warning' : 'far fa-star text-warning')}`;
                ratingContainer.appendChild(star);
            }
            document.getElementById('nurseReviewCount').textContent = `(${data.reviews} reviews)`;

            // Sample data - in real app you'd fetch this from an API
            document.getElementById('nurseTotalRequests').textContent = '142';
            document.getElementById('nurseExperience').textContent = '8 years';
            document.getElementById('nurseResponseTime').textContent = 'Within 1 hour';
            document.getElementById('nurseAge').textContent = '34';
            document.getElementById('nurseGender').textContent = 'Female';
            document.getElementById('nurseLanguages').textContent = 'English, Spanish';
            document.getElementById('nurseLocation').textContent = 'Within 5 miles of you';
            document.getElementById('nurseRate').textContent = '$45/hour';
            document.getElementById('nurseLastActive').textContent = 'Active today';
            document.getElementById('nurseBio').textContent =
                'Certified wound care specialist with 8 years of hospital experience. Specializing in post-surgical care and diabetic wound management.';

            // Certifications
            const certsContainer = document.getElementById('nurseCertificationsList');
            certsContainer.innerHTML = '';
            const certifications = [{
                    name: 'RN License',
                    date: '2015',
                    issuer: 'State Board'
                },
                {
                    name: 'Wound Care Certification',
                    date: '2018',
                    issuer: 'WOCNCB'
                },
                {
                    name: 'CPR/BLS',
                    date: '2023',
                    issuer: 'American Heart Association'
                }
            ];

            certifications.forEach(cert => {
                const col = document.createElement('div');
                col.className = 'col-md-6 mb-3';
                col.innerHTML = `
      <div class="card h-100">
        <div class="card-body">
          <h6 class="card-title">${cert.name}</h6>
          <p class="small mb-1">Issued: ${cert.date}</p>
          <p class="small text-muted">${cert.issuer}</p>
        </div>
      </div>
    `;
                certsContainer.appendChild(col);
            });

            // Schedule - simple example
            const availabilityList = document.getElementById('nurseGeneralAvailability');
            availabilityList.innerHTML = '';
            ['Monday-Friday: 9am-5pm', 'Saturday: 10am-2pm', 'Sunday: Not available'].forEach(time => {
                const li = document.createElement('li');
                li.textContent = time;
                availabilityList.appendChild(li);
            });

            // Connect request button
            document.getElementById('requestThisNurseBtn').onclick = function() {
                // You could pre-fill the request form with this nurse's ID
                bootstrap.Modal.getInstance(document.getElementById('nurseProfileModal')).hide();
                // Optionally open the request form tab
                document.querySelector('[href="#request-service"]').click();
            };
        }

        // Add this to your existing script section
        document.querySelectorAll('.btn-outline-primary').forEach(btn => {
            if (btn.textContent.trim() === 'Details') {
                btn.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const requestData = {
                        id: row.cells[0].textContent,
                        serviceType: row.cells[1].textContent,
                        dateTime: row.cells[2].textContent,
                        nurse: row.cells[3].textContent,
                        status: row.cells[4].textContent,
                        // These would normally come from your data source
                        patientName: "John Patient",
                        patientGender: "Male",
                        careNeeded: "Wound Care, Mobility Assistance",
                        address: "123 Main St, Apt 4B, New York, NY 10001",
                        instructions: "Please ring doorbell twice. Dog will bark but is friendly.",
                        urgent: true,
                        nursePhoto: "https://randomuser.me/api/portraits/women/44.jpg",
                        nurseSpecialty: "Wound Care Specialist",
                        nursePhone: "(555) 123-4567",
                        nurseRating: "4.8 (42 reviews)"
                    };

                    populateRequestDetails(requestData);
                    new bootstrap.Modal(document.getElementById('requestDetailsModal')).show();
                });
            }
        });

        function populateRequestDetails(data) {
            // Basic info
            document.getElementById('requestIdBadge').textContent = data.id;
            document.getElementById('detailServiceType').textContent = data.serviceType;
            document.getElementById('detailRequestDate').textContent = new Date().toLocaleDateString();
            document.getElementById('detailScheduledTime').textContent = data.dateTime;
            document.getElementById('detailStatus').innerHTML = `<span class="badge ${getStatusBadgeClass(data.status)}">${data.status}</span>`;
            document.getElementById('detailUrgency').textContent = data.urgent ? "Urgent" : "Standard";

            // Nurse info
            document.getElementById('detailNurseName').textContent = data.nurse;
            document.getElementById('detailNurseSpecialty').textContent = data.nurseSpecialty;
            document.getElementById('detailNursePhoto').src = data.nursePhoto;
            document.getElementById('detailNursePhone').textContent = data.nursePhone;
            document.getElementById('detailNurseRating').innerHTML = `
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star text-warning"></i>
    <i class="fas fa-star-half-alt text-warning"></i>
    <span class="small ms-1">${data.nurseRating}</span>
  `;

            // Patient info
            document.getElementById('detailPatientName').textContent = data.patientName;
            document.getElementById('detailPatientGender').textContent = data.patientGender;
            document.getElementById('detailCareNeeded').textContent = data.careNeeded;

            // Location and instructions
            document.getElementById('detailServiceAddress').textContent = data.address;
            document.getElementById('detailSpecialInstructions').textContent = data.instructions;

            // Connect contact button
            document.getElementById('contactNurseBtn').onclick = function() {
                // This would open the messages tab with this nurse pre-selected
                bootstrap.Modal.getInstance(document.getElementById('requestDetailsModal')).hide();
                document.querySelector('[href="#messages"]').click();
            };
        }

        function getStatusBadgeClass(statusText) {
            if (statusText.includes("Confirmed")) return "bg-success";
            if (statusText.includes("Pending")) return "bg-warning";
            if (statusText.includes("Completed")) return "bg-secondary";
            if (statusText.includes("Cancelled")) return "bg-danger";
            return "bg-primary";
        }



                                // Image Upload Functionality
                                document.getElementById('profileImageUpload').addEventListener('change', function(e) {
                                    const file = e.target.files[0];
                                    const preview = document.getElementById('profileImagePreview');
                                    const errorElement = document.getElementById('uploadError');
        
                                    errorElement.style.display = 'none';
        
                                    if (!file) return;
        
                                    if (file.size > 5 * 1024 * 1024) {
                                        errorElement.textContent = 'File is too large (max 5MB)';
                                        errorElement.style.display = 'block';
                                        return;
                                    }
        
                                    if (!['image/jpeg', 'image/png'].includes(file.type)) {
                                        errorElement.textContent = 'Only JPG/PNG files allowed';
                                        errorElement.style.display = 'block';
                                        return;
                                    }
        
                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        preview.src = e.target.result;
                                    };
                                    reader.readAsDataURL(file);
                                });
        
                                // Edit Profile Toggle Functionality
                                const editProfileBtn = document.getElementById('editProfileBtn');
                                const cancelEditBtn = document.getElementById('cancelEditBtn');
                                const viewMode = document.getElementById('viewMode');
                                const editMode = document.getElementById('editMode');
        
                                let isEditMode = false;
        
                                function toggleEditMode() {
                                    isEditMode = !isEditMode;
        
                                    if (isEditMode) {
                                        viewMode.style.display = 'none';
                                        editMode.style.display = 'block';
                                        editProfileBtn.textContent = 'View Profile';
        
                                        // Transfer current values to edit fields
                                        document.getElementById('editFirstName').value = document.getElementById('viewFirstName').textContent;
                                        document.getElementById('editLastName').value = document.getElementById('viewLastName').textContent;
                                        document.getElementById('editEmail').value = document.getElementById('viewEmail').textContent;
                                        document.getElementById('editPhone').value = document.getElementById('viewPhone').textContent;
                                        document.getElementById('editAddress').value = document.getElementById('viewAddress').textContent.replace(/<br>/g, '\n');
                                        document.getElementById('editMedicalHistory').value = document.getElementById('viewMedicalHistory').textContent.replace(/<br>/g, '\n');
                                    } else {
                                        viewMode.style.display = 'block';
                                        editMode.style.display = 'none';
                                        editProfileBtn.textContent = 'Edit Profile';
                                    }
                                }
        
                                editProfileBtn.addEventListener('click', toggleEditMode);
                                cancelEditBtn.addEventListener('click', toggleEditMode);
        
                                // Form Submission
                                document.getElementById('profileForm').addEventListener('submit', function(e) {
                                    e.preventDefault();
        
                                    if (isEditMode) {
                                        // Update view mode with edited values
                                        document.getElementById('viewFirstName').textContent = document.getElementById('editFirstName').value;
                                        document.getElementById('viewLastName').textContent = document.getElementById('editLastName').value;
                                        document.getElementById('viewEmail').textContent = document.getElementById('editEmail').value;
                                        document.getElementById('viewPhone').textContent = document.getElementById('editPhone').value;
                                        document.getElementById('viewAddress').innerHTML = document.getElementById('editAddress').value.replace(/\n/g, '<br>');
                                        document.getElementById('viewMedicalHistory').innerHTML = document.getElementById('editMedicalHistory').value.replace(/\n/g, '<br>');
        
                                        // Here you would typically send the data to your server
                                        // const formData = {
                                        //     firstName: document.getElementById('editFirstName').value,
                                        //     lastName: document.getElementById('editLastName').value,
                                        //     email: document.getElementById('editEmail').value,
                                        //     phone: document.getElementById('editPhone').value,
                                        //     address: document.getElementById('editAddress').value,
                                        //     medicalHistory: document.getElementById('editMedicalHistory').value
                                        // };
                                        // console.log('Data to be saved:', formData);
        
                                        toggleEditMode();
                                    }
                                });
                            
    