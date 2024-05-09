document.querySelector('.view-more-button').addEventListener('click', function() {
    const additionalInfo = document.querySelector('.additional-info');
    const svgArrow = document.querySelector('.svg');

    if (additionalInfo.style.display === 'none') {
        additionalInfo.style.display = 'block';
        svgArrow.style.transform = 'rotate(180deg)';
        additionalInfo.scrollIntoView({ behavior: 'smooth', block: 'start' });
    } else {
        additionalInfo.style.display = 'none';
        svgArrow.style.transform = 'rotate(0deg)';
    }
});


