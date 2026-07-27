
    document.addEventListener('DOMContentLoaded', () => {
        const itemsPerPage = 9;
        const cards = Array.from(document.querySelectorAll('.product-card'));
        const totalPages = Math.ceil(cards.length / itemsPerPage);
        let currentPage = 1;

        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        const pageNumbersContainer = document.getElementById('pagination-numbers');

        function renderPagination() {
            // Hide all cards first
            cards.forEach(card => card.classList.add('hidden'));

            // Calculate slice indices for the current page
            const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;

            // Show only cards for current page
            cards.slice(start, end).forEach(card => card.classList.remove('hidden'));

            // Update Prev / Next button states
            prevBtn.disabled = currentPage === 1;
            nextBtn.disabled = currentPage === totalPages || totalPages === 0;

            // Render page number buttons
            pageNumbersContainer.innerHTML = '';
            for (let i = 1; i <= totalPages; i++) {
                const btn = document.createElement('button');
                btn.innerText = i;
                btn.className = `px-3.5 py-1.5 rounded-lg text-sm font-semibold transition-colors ${
                i === currentPage 
                    ? 'bg-[#8fc74a] text-white shadow-md' 
                    : 'bg-gray-800 text-white hover:bg-gray-700'
            }`;

                btn.addEventListener('click', () => {
                    currentPage = i;
                    renderPagination();
                });

                pageNumbersContainer.appendChild(btn);
            }
        }

        // Event listeners for Previous and Next
        prevBtn.addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                renderPagination();
            }
        });

        nextBtn.addEventListener('click', () => {
            if (currentPage < totalPages) {
                currentPage++;
                renderPagination();
            }
        });

        // Initial run
        renderPagination();
    });
