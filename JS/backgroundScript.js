document.addEventListener('DOMContentLoaded', function() {
    document.body.style.backgroundColor = 'rgb(239, 249, 255)'; // Set initial background color to pink
});

document.addEventListener('scroll', function() {
    const scrollTop = window.scrollY;
    const windowHeight = window.innerHeight;
    const docHeight = document.documentElement.scrollHeight;
    const scrollPercent = scrollTop / (docHeight - windowHeight); // Calculate scroll percentage

    // Define the range of colors for the gradient
    const colorRange = [
        { r: 239, g: 249, b: 255 }, // 239, 249, 255
        { r: 215, g: 239, b: 255 },   // 215, 239, 255
        { r: 190, g: 229, b: 255 },   // 190, 229, 255
        { r: 158, g: 216, b: 255 },     // 158, 216, 255
        { r: 142, g: 210, b: 255 }      // 142, 210, 255
    //     $tropical-indigo: rgba(171, 144, 255, 1);
    // $tropical-indigo-2: rgba(165, 153, 255, 1);
    // $vista-blue: rgba(158, 161, 255, 1);
    // $jordy-blue: rgba(144, 179, 255, 1);
    // $jordy-blue-2: rgba(134, 191, 255, 1);
    // $light-sky-blue: rgba(125, 203, 255, 1);
    // $pale-azure: rgba(116, 216, 255, 1);
    // $non-photo-blue: rgba(106, 228, 255, 1);
    ];

    // Calculate the index of the start and end colors based on the scroll percentage
    const startIndex = Math.floor(scrollPercent * (colorRange.length - 1));
    const endIndex = Math.min(startIndex + 1, colorRange.length - 1);
    const startColor = colorRange[startIndex];
    const endColor = colorRange[endIndex];
    const remainder = scrollPercent * (colorRange.length - 1) - startIndex;

    // Interpolate between the start and end colors
    const red = Math.round(startColor.r + (endColor.r - startColor.r) * remainder);
    const green = Math.round(startColor.g + (endColor.g - startColor.g) * remainder);
    const blue = Math.round(startColor.b + (endColor.b - startColor.b) * remainder);

    // Set the background color
    document.body.style.backgroundColor = `rgb(${red}, ${green}, ${blue})`;
});
