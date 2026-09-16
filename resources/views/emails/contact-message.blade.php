<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pesan Baru - BookStore</title>
</head>

<body style="font-family: Arial, sans-serif; background: #f5f5f5; padding: 30px;">

    <div style="
        max-width: 600px;
        margin: auto;
        background: white;
        padding: 30px;
        border-radius: 12px;
    ">

        <h2 style="margin-bottom: 25px;">
            Pesan Baru dari BookStore
        </h2>

        <p>
            Kamu menerima pesan baru dari halaman Contact BookStore.
        </p>

        <hr>

        <p>
            <strong>Nama:</strong><br>
            {{ $contactMessage->name }}
        </p>

        <p>
            <strong>Email:</strong><br>
            {{ $contactMessage->email }}
        </p>

        <p>
            <strong>Pesan:</strong><br>
            {{ $contactMessage->message }}
        </p>

        <hr>

        <p style="color: #777; font-size: 13px;">
            Email ini dikirim otomatis oleh sistem BookStore.
        </p>

    </div>

</body>

</html>