    function openModal(id) {
            document.getElementById(id).style.display = "block";
            document.getElementById("overlay").style.display = "block";
            }

 
            function closeModal(id) {
            document.getElementById(id).style.display = "none";
            document.getElementById("overlay").style.display = "none";
            }

            function switchModal(closeId, openId) {
            closeModal(closeId);
            openModal(openId);
            }

        
            function loginUser() {
            
            
            }

            function signupUser() {
            
            }
        function openModal(id) {
    document.getElementById(id).style.display = "block";
    }

    function closeModal(id) {
    document.getElementById(id).style.display = "none";
    }

    function onPaymentMethodChange() {
    const pm = document.getElementById("paymentMethod").value;
    const infoDiv = document.getElementById("paymentInfo");
    const instructions = document.getElementById("paymentInstructions");
    const refInput = document.getElementById("paymentRef");

    if (!pm) {
        infoDiv.style.display = "none";
        refInput.style.display = "none";
        return;
    }

    infoDiv.style.display = "block";

    switch (pm) {
        case "telebirr":
        instructions.innerText = "Send payment to Telebirr: +251 9XX XXX XXX. Enter transaction code below.";
        refInput.style.display = "block";
        refInput.placeholder = "Telebirr Transaction Code";
        break;
        case "cbe_birr":
        instructions.innerText = "Transfer to CBE Birr account 1234 5678 9012. Enter reference below.";
        refInput.style.display = "block";
        refInput.placeholder = "CBE Birr Reference Code";
        break;
        case "bank_transfer":
        instructions.innerText = "Transfer to Bank: Awash Bank, Account: 0130023456200. Enter reference below.";
        refInput.style.display = "block";
        refInput.placeholder = "Bank Transfer Reference";
        break;
        case "cod":
        instructions.innerText = "Cash on Delivery selected. Pay when your order arrives.";
        refInput.style.display = "none";
        break;
    }
    }

    function submitOrder() {
    const name = document.getElementById("customerName").value.trim();
    const phone = document.getElementById("customerPhone").value.trim();
    const address = document.getElementById("customerAddress").value.trim();
    const city = document.getElementById("customerCity").value.trim();
    const pm = document.getElementById("paymentMethod").value;
    const ref = document.getElementById("paymentRef").value.trim();
    const qty = parseInt(document.getElementById("orderQuantity").value, 10);
    const item = document.getElementById("orderItem").value || "Cake";
    const price = parseFloat(document.getElementById("orderPrice").value) || 250;

    if (!name || !phone || !address || !city || !pm) {
        alert("Please fill all required fields and select payment method.");
        return;
    }

    if ((pm === "telebirr" || pm === "cbe_birr" || pm === "bank_transfer") && !ref) {
        alert("Please enter your payment reference code.");
        return;
    }

    const total = price * qty;

    alert(
        `Order Summary:\nName: ${name}\nPhone: ${phone}\nAddress: ${address}, ${city}\nItem: ${item}\nQuantity: ${qty}\nPayment: ${pm}${ref ? `\nReference: ${ref}` : ""}\nTotal: ${total} Birr`
    );

    closeModal("buyModal");
    }





    document.querySelector('.hamburger').addEventListener('click', function() {
        const navLinks = document.querySelector('.nav-links');
        const authButtons = document.querySelector('.auth-buttons');
        
        if (navLinks.style.display === 'flex') {
            navLinks.style.display = 'none';
            authButtons.style.display = 'none';
        } else {
            navLinks.style.display = 'flex';
            authButtons.style.display = 'flex';
            navLinks.style.flexDirection = 'column';
            authButtons.style.flexDirection = 'column';
            navLinks.style.position = 'absolute';
            navLinks.style.top = '100%';
            navLinks.style.left = '0';
            navLinks.style.width = '100%';
            navLinks.style.backgroundColor = 'white';
            navLinks.style.padding = '1rem';
            navLinks.style.gap = '1rem';
            navLinks.style.boxShadow = '0 5px 10px rgba(0,0,0,0.1)';
            
            authButtons.style.position = 'absolute';
            authButtons.style.top = 'calc(100% + 150px)';
            authButtons.style.left = '0';
            authButtons.style.width = '100%';
            authButtons.style.backgroundColor = 'white';
            authButtons.style.padding = '1rem';
            authButtons.style.gap = '1rem';
            authButtons.style.boxShadow = '0 5px 10px rgba(0,0,0,0.1)';
        }
    });

    const hamburger = document.querySelector('.hamburger');
    const navbar = document.querySelector('.navbar');
    
    hamburger.addEventListener('click', () => {

        let mobileMenu = document.querySelector('.mobile-menu');
        
        if (mobileMenu) {
            mobileMenu.remove();
        } else {

            mobileMenu = document.createElement('div');
            mobileMenu.className = 'mobile-menu';

            const mobileAuth = document.createElement('div');
            mobileAuth.className = 'mobile-auth';
            
            const loginBtn = document.createElement('button');
            loginBtn.className = 'btn login-btn';
            loginBtn.textContent = 'Log In';
            
            const signupBtn = document.createElement('button');
            signupBtn.className = 'btn signup-btn';
            signupBtn.textContent = 'Sign Up';
            
            
            navbar.appendChild(mobileMenu);
        }
    });
function openBuyModal(name, price) {
    document.getElementById('orderItem').value = name;
    document.getElementById('orderPrice').value = price;
    openModal('buyModal');
}
