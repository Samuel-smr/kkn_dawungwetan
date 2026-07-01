<?php
$files = array_merge(
    glob('resources/views/admin/*.blade.php'),
    glob('resources/views/admin/*/*.blade.php')
);

foreach($files as $file) {
    $content = file_get_contents($file);
    
    // Body background
    $content = str_replace('bg-amber-50', 'bg-[#fbfaf5]', $content);
    $content = str_replace('bg-emerald-50/50', 'bg-gray-50', $content);
    $content = str_replace('bg-emerald-50', 'bg-[#f0f9f4]', $content);
    
    // Borders
    $content = str_replace('border-emerald-100', 'border-gray-200', $content);
    $content = str_replace('border-emerald-50', 'border-gray-100', $content);
    $content = str_replace('border-amber-100', 'border-gray-200', $content);
    $content = str_replace('border-amber-50', 'border-gray-100', $content);
    
    // Text colors
    $content = str_replace('text-emerald-950', 'text-[#1a4d33]', $content);
    $content = str_replace('text-emerald-900', 'text-[#1a4d33]', $content);
    $content = str_replace('text-emerald-800', 'text-[#1e583f]', $content);
    $content = str_replace('text-emerald-700', 'text-[#246343]', $content);
    $content = str_replace('text-emerald-600', 'text-[#246343]', $content);
    
    // Solid background colors (emerald)
    $content = str_replace('bg-emerald-500', 'bg-[#246343]', $content);
    $content = str_replace('bg-emerald-600', 'bg-[#1e583f]', $content);
    $content = str_replace('bg-emerald-700', 'bg-[#1a4d33]', $content);
    
    // Gradients
    $content = str_replace('from-emerald-700', 'from-[#1e583f]', $content);
    $content = str_replace('to-emerald-600', 'to-[#246343]', $content);
    $content = str_replace('hover:from-emerald-800', 'hover:from-[#1a4d33]', $content);
    $content = str_replace('hover:to-emerald-700', 'hover:to-[#1e583f]', $content);
    
    // Amber Gradients to Gold
    $content = str_replace('from-amber-500', 'from-[#deaf65]', $content);
    $content = str_replace('to-amber-600', 'to-[#c99a53]', $content);
    $content = str_replace('hover:from-amber-600', 'hover:from-[#c99a53]', $content);
    $content = str_replace('hover:to-amber-500', 'hover:to-[#b38541]', $content);
    
    file_put_contents($file, $content);
}
echo 'Theme applied to admin views.';
