<?php

// Réponse par défaut
$response = [
    'success' => false,
    'message' => 'Erreur lors de l\'ajout au panier.'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['nom']) && isset($data['prix'])) {
        $_SESSION['cart'][] = [
            'nom' => $data['nom'],
            'prix' => $data['prix']
        ];

        $response = [
            'success' => true,
            'message' => 'Produit ajouté au panier.',
            'cart' => $_SESSION['cart']
        ];
    }
}
header('Content-Type: application/json');
echo json_encode($response);