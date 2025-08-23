function toggleNid() {
  let userType = document.getElementById("userType").value;
  let nidField = document.getElementById("nidField");
  nidField.style.display = userType === "farmer" ? "block" : "none";
}

// Validate the registration form
function validateForm() {
  let userId = document.getElementById("userId").value.trim();
  let name = document.getElementById("name").value.trim();
  let email = document.getElementById("email").value.trim();
  let phone = document.getElementById("phone").value.trim();
  let password = document.getElementById("password").value;
  let userType = document.getElementById("userType").value;
  let address = document.getElementById("address").value.trim();
  let nid = document.getElementById("nid").value.trim();

  // User ID: alphanumeric, min 4 chars
  if (!/^[a-zA-Z0-9]{4,}$/.test(userId)) {
    alert("User ID must be at least 4 characters (letters and numbers only).");
    return false;
  }

  // Name: letters and spaces only
  if (!/^[a-zA-Z ]+$/.test(name)) {
    alert("Name must contain only letters and spaces.");
    return false;
  }

  // Email validation
  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    alert("Enter a valid email address.");
    return false;
  }

  // Phone: 10–15 digits
  if (!/^[0-9]{10,15}$/.test(phone)) {
    alert("Phone number must be 10–15 digits.");
    return false;
  }

  // Password: min 6 chars, must contain both letters and numbers
  if (!/^(?=.*[a-zA-Z])(?=.*[0-9]).{6,}$/.test(password)) {
    alert(
      "Password must be at least 6 characters and include both letters and numbers."
    );
    return false;
  }

  // User type must be selected
  if (userType === "") {
    alert("Please select a User Type.");
    return false;
  }

  // Address: minimum 5 characters
  if (address.length < 5) {
    alert("Address must be at least 5 characters long.");
    return false;
  }

  // NID required if farmer
  if (userType === "farmer") {
    if (!/^[0-9]{10,17}$/.test(nid)) {
      alert("NID must be 10-17 digits.");
      return false;
    }
  }

  return true; // Allow form submit
}
