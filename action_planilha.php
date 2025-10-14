<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // URL do Apps Script
    $url = "https://script.google.com/macros/s/AKfycbyQyAWb_SdQilqgU9qaXeYWSsSRbe7o8Hz1qXqeLK-jZksX7ant8d7ihZgIdDhdAzu8fg/exec";

    // Dados do formulário
    $data = [
        "nome" => $_POST["nome"] ?? "",
        "email" => $_POST["email"] ?? "",
        "mensagem" => $_POST["mensagem"] ?? ""
        // Adicione outros campos conforme necessário
    ];

    // Inicializa cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    echo "<p>Dados enviados para a planilha com sucesso!</p>";
    echo "<pre>".htmlspecialchars($response)."</pre>";

} else {
    echo "<p>Nenhum dado foi enviado.</p>";
}
?>
