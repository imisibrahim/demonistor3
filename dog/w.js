document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("walletModal");
    const openModalBtn = document.getElementById("openModalBtn");
    const closeModalBtn = document.querySelector(".close-btn");
    const connectWalletBtn = document.getElementById("connectWallet");
    const cancelWalletBtn = document.getElementById("cancelWallet");
    const statusMessage = document.getElementById("statusMessage");

    // Open modal
    openModalBtn.addEventListener("click", () => {
        modal.style.display = "block";
    });

    // Close modal
    closeModalBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });
    cancelWalletBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

    // Connect wallet logic
    connectWalletBtn.addEventListener("click", async () => {
        statusMessage.textContent = "Connecting to TON Wallet...";
        try {
            // Replace with actual TON Wallet connection logic
            statusMessage.textContent = "Wallet Connected Successfully!";
        } catch (error) {
            statusMessage.textContent = "Failed to connect wallet.";
        }
    });

    // Close modal on outside click
    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});
