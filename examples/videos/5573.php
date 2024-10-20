<?php

// Example: Creating a self-signed certificate using openssl_csr_sign()

// Generate a new private key
$privateKey = openssl_pkey_new([
    "private_key_bits" => 2048,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
]);

// Generate a CSR
$dn = [
    "countryName" => "US",
    "stateOrProvinceName" => "California",
    "localityName" => "Los Angeles",
    "organizationName" => "My Company",
    "organizationalUnitName" => "Development",
    "commonName" => "www.mycompany.com",
    "emailAddress" => "admin@mycompany.com"
];

// Create CSR
$csr = openssl_csr_new($dn, $privateKey);

// Self-sign the CSR to create a certificate
$validFrom = time();
$validTo = $validFrom + (365 * 24 * 60 * 60); // Valid for 1 year
$certificate = openssl_csr_sign($csr, null, $privateKey, 365);

// Save the private key to a file
openssl_pkey_export_to_file($privateKey, '/tmp/test/private_key.pem');

// Save the certificate to a file
openssl_x509_export_to_file($certificate, '/tmp/test/self_signed_certificate.crt');

// Output success message
echo "Self-signed certificate created successfully." . PHP_EOL;

?>