<div style="font-family: Arial, sans-serif; color: #333;">
    <h2>Imayah : Nouveau message</h2>

    <p><strong>Nom :</strong> {{ $data['name'] }}</p>
    <p><strong>Prénom :</strong> {{ $data['firstName'] }}</p>
    <p><strong>Téléphone :</strong> {{ $data['tel'] }}</p>
    <p><strong>Email :</strong> {{ $data['email'] }}</p>
    <p><strong>Message :</strong></p>
    <p>{!! nl2br(e($data['message'])) !!}</p>
</div>