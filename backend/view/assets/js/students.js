// DOM Elements
const studentTable = document.getElementById('studentTable');
const addStudentForm = document.getElementById('addStudentForm');
const fieldFilter = document.getElementById('fieldFilter');
const searchInput = document.getElementById('searchInput');
const addStudentButton = document.querySelector('[data-bs-target="#addStudentModal"]');

// Reset form when Add Student button is clicked
addStudentButton.addEventListener('click', () => {
    addStudentForm.reset();
    document.querySelector('#addStudentModal .modal-title').textContent = 'Add Student';
    // Reset filiere dropdown to empty state
    document.getElementById('filiere').value = '';
    // Clear the hidden id field
    document.querySelector('input[name="id_etudiant"]').value = '';
});

// Load filieres (fields of study) when the page loads
document.addEventListener('DOMContentLoaded', () => {
    loadFilieres();
    loadStudents();
});

// Fetch filieres from API and populate dropdowns
async function loadFilieres() {
    try {
        const response = await fetch('../../route/filiereRoute.php');
        if (!response.ok) throw new Error('Failed to fetch filieres');
        
        const data = await response.json();
        if (data.error) throw new Error(data.error);

        const filieres = data.data;
        updateFiliereDropdowns(filieres);
    } catch (error) {
        console.error('Error loading filieres:', error);
        showAlert('Error loading fields of study', 'danger');
    }
}

// Update filiere dropdowns with fetched data
function updateFiliereDropdowns(filieres) {
    const filterSelect = document.getElementById('fieldFilter');
    const modalSelect = document.getElementById('filiere');
    
    // Clear existing options except the first one for filter
    filterSelect.innerHTML = '<option value="">All Fields of Study</option>';
    modalSelect.innerHTML = '';

    filieres.forEach(filiere => {
        // Add option to filter dropdown
        filterSelect.appendChild(createOption(filiere.id_filiere, filiere.nom_filiere));
        
        // Add option to modal dropdown
        modalSelect.appendChild(createOption(filiere.id_filiere, filiere.nom_filiere));
    });
}

// Helper function to create option elements
function createOption(value, text) {
    const option = document.createElement('option');
    option.value = value;
    option.textContent = text;
    return option;
}

// Load students data
async function loadStudents() {
    try {
        const response = await fetch('../../route/etudiantRoute.php');
        if (!response.ok) throw new Error('Failed to fetch students');

        const data = await response.json();
        if (data.error) throw new Error(data.error);

        displayStudents(data.data);
    } catch (error) {
        console.error('Error loading students:', error);
        showAlert('Error loading students data', 'danger');
    }
}

// Display students in the table
function displayStudents(students) {
    const tbody = studentTable.querySelector('tbody');
    tbody.innerHTML = '';

    students.forEach(student => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${student.CNE}</td>
            <td>${student.nom}</td>
            <td>${student.prenom}</td>
            <td>${student.email}</td>
            <td>${student.tele}</td>
            <td>${student.sexe}</td>
            <td>${student.nom_filiere || student.filiere || 'N/A'}</td>
            <td class="student-actions">
                <button class="btn btn-sm btn-primary" onclick="editStudent(${student.id_etudiant})">
                    <i class="bi bi-pencil"></i>
                </button>
                <button class="btn btn-sm btn-danger" onclick="deleteStudent(${student.id_etudiant})">
                    <i class="bi bi-trash"></i>
                </button>
            </td>
        `;
        tbody.appendChild(row);
    });
}

// Handle form submission
addStudentForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(addStudentForm);
    const studentData = Object.fromEntries(formData.entries());
    
    try {
        const cne = studentData.CNE;
        const method = document.querySelector('#addStudentModal .modal-title').textContent === 'Edit Student' ? 'PUT' : 'POST';
        const url = '../../route/etudiantRoute.php' + (method === 'PUT' ? `?cne=${cne}` : '');

        // Convert filiere to id_filiere
        if (studentData.filiere) {
            studentData.id_filiere = studentData.filiere;
            delete studentData.filiere;
        }

        const response = await fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(studentData)
        });

        const result = await response.json();
        if (!response.ok || result.error) {
            throw new Error(result.error || 'Failed to save student');
        }

        // Close modal and reload data
        bootstrap.Modal.getInstance(document.getElementById('addStudentModal')).hide();
        addStudentForm.reset();
        loadStudents();
        showAlert('Student saved successfully', 'success');
    } catch (error) {
        console.error('Error saving student:', error);
        showAlert(`Error saving student: ${error.message}`, 'danger');
    }
});

// Filter students
fieldFilter.addEventListener('change', filterStudents);
searchInput.addEventListener('input', filterStudents);

async function filterStudents() {
    const fieldValue = fieldFilter.value.toLowerCase();
    const searchValue = searchInput.value.toLowerCase();

    try {
        const response = await fetch('../../route/etudiantRoute.php');
        if (!response.ok) throw new Error('Failed to fetch students');

        const data = await response.json();
        if (data.error) throw new Error(data.error);
        if (!Array.isArray(data.data)) throw new Error('Invalid data format');

        const filteredStudents = data.data.filter(student => {
            if (!student) return false;

            const matchesField = !fieldValue || 
                (student.id_filiere && student.id_filiere.toString() === fieldValue);

            const searchableFields = ['CNE', 'nom', 'prenom', 'email'];
            const matchesSearch = !searchValue || 
                searchableFields.some(field => 
                    student[field] && student[field].toString().toLowerCase().includes(searchValue)
                );

            return matchesField && matchesSearch;
        });

        displayStudents(filteredStudents);
    } catch (error) {
        console.error('Error filtering students:', error);
        showAlert('Error filtering students', 'danger');
    }
}

// Show alert message
function showAlert(message, type) {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;

    const container = document.querySelector('.student-management-container');
    container.insertBefore(alertDiv, container.firstChild);

    setTimeout(() => alertDiv.remove(), 5000);
}

// Edit student function
async function editStudent(studentId) {
    try {
        // Get CNE from the table row
        const row = document.querySelector(`tr button[onclick="editStudent(${studentId})"]`).closest('tr');
        const cne = row.cells[0].textContent;
        
        if (!cne) throw new Error('Could not find student CNE');

        // Fetch student data using CNE
        const response = await fetch(`../../route/etudiantRoute.php?cne=${cne}`);
        if (!response.ok) throw new Error('Failed to fetch student data');

        const data = await response.json();
        if (data.error) throw new Error(data.error);

        const student = data.data;
        if (!student) throw new Error('No student data received');

        // Get form elements
        const form = document.getElementById('addStudentForm');
        const fields = ['id_etudiant', 'CNE', 'nom', 'prenom', 'email', 'tele', 'sexe', 'pays', 'ville', 
                       'date_naissance', 'lieu_naissance', 'coordonne_parental', 'date_inscription'];

        // Reset form before populating
        form.reset();

        // Populate form fields safely
        fields.forEach(field => {
            const element = form.elements[field];
            if (element && student[field] !== undefined) {
                element.value = student[field];
            }
        });

        // Set filiere field separately since it needs id_filiere
        const filiereElement = form.elements['filiere'];
        if (filiereElement && student.id_filiere !== undefined) {
            filiereElement.value = student.id_filiere;
        }

        // Update modal title to indicate editing
        const modalTitle = document.querySelector('#addStudentModal .modal-title');
        modalTitle.textContent = 'Edit Student';

        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('addStudentModal'));
        modal.show();
    } catch (error) {
        console.error('Error fetching student:', error);
        showAlert('Error loading student data', 'danger');
    }
}

// Delete student function
async function deleteStudent(studentId) {
    // Show confirmation dialog
    if (!confirm('Are you sure you want to delete this student?')) {
        return;
    }

    try {
        // Get CNE from the table row
        const row = document.querySelector(`tr button[onclick="deleteStudent(${studentId})"]`).closest('tr');
        const cne = row.cells[0].textContent;
        
        if (!cne) throw new Error('Could not find student CNE');

        // Send delete request
        const deleteResponse = await fetch(`../../route/etudiantRoute.php?cne=${cne}`, {
            method: 'DELETE'
        });

        if (!deleteResponse.ok) throw new Error('Failed to delete student');

        const result = await deleteResponse.json();
        if (result.error) throw new Error(result.error);

        // Reload students and show success message
        loadStudents();
        showAlert('Student deleted successfully', 'success');
    } catch (error) {
        console.error('Error deleting student:', error);
        showAlert('Error deleting student', 'danger');
    }
}
