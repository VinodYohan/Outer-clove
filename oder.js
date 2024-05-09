// Predefined data (replace this with your actual data)
const menuItems = ['biriyani', 'Pizza', 'Meat',];
const customizationOptions = {
  'biriyani': ['Chicken biriyani', 'Beef biriyani','mutton biriyani',],
  'Pizza': ['Chicken Pizza', 'Beef Pizza', 'Naikochi Pizza','Beef Pizza'],
  'Meat': ['BBq Chicken', 'Beef','Black Pork']
};
const quantities = [1, 2, 3, 4, 5];
const sizes = ['Regular', 'Larg', 'Family'];

// Function to populate menu items
function populateMenuItems() {
  const selectMenu = document.getElementById('menuItems');
  menuItems.forEach(item => {
    const option = document.createElement('option');
    option.text = item;
    selectMenu.add(option);
  });
}

// Function to populate customization options based on selected menu item
function populateCustomizationOptions(selectedItem) {
  const customizationDiv = document.getElementById('customizationOptions');
  customizationDiv.innerHTML = ''; // Clear previous options
  const options = customizationOptions[selectedItem];
  if (options) {
    options.forEach(opt => {
      const checkbox = document.createElement('input');
      checkbox.type = 'checkbox';
      checkbox.name = 'customization';
      checkbox.value = opt;

      const label = document.createElement('label');
      label.htmlFor = opt;
      label.appendChild(document.createTextNode(opt));

      customizationDiv.appendChild(checkbox);
      customizationDiv.appendChild(label);
      customizationDiv.appendChild(document.createElement('br'));
    });
  }
}

// Function to populate quantity options
function populateQuantity() {
  const selectQuantity = document.getElementById('quantity');
  quantities.forEach(qty => {
    const option = document.createElement('option');
    option.text = qty;
    selectQuantity.add(option);
  });
}

// Function to populate size options
function populateSize() {
  const selectSize = document.getElementById('size');
  sizes.forEach(size => {
    const option = document.createElement('option');
    option.text = size;
    selectSize.add(option);
  });
}

// Call functions to populate dynamic content
populateMenuItems();
populateQuantity();
populateSize();

// Event listener for menu item selection
document.getElementById('menuItems').addEventListener('change', function() {
  const selectedItem = this.value;
  populateCustomizationOptions(selectedItem);
});

// Sample data - Replace this with your actual logic to calculate total cost
function calculateTotalCost() {
    // Sample calculation logic
    const totalPrice = 50; // Replace this with your actual total
    return totalPrice;
  }
  
  // Function to display total cost
  function displayTotalCost() {
    const totalDiv = document.getElementById('totalCost');
    const totalPrice = calculateTotalCost();
    totalDiv.textContent = `Total Cost: $${totalPrice}`;
  }
  
  // Sample terms and conditions text - Replace this with your actual terms
  const termsText = `
    By placing this order, you agree to our terms and conditions.
    All sales are final. No refunds or exchanges.
    Thank you for choosing our service!
  `;
  
  // Function to display terms and conditions
  function displayTermsAndConditions() {
    const termsDiv = document.getElementById('terms');
    termsDiv.textContent = termsText;
  }
  
  // Call functions to display dynamic content
  displayTotalCost();
  displayTermsAndConditions();
  