<x-mail::message>
# Nouvelle demande de contact

Une nouvelle demande de contact a été faite pour le bien <x-mail::button :url="route('property.show', ['slug' => $property->getSlug(), 'property' => $property])">
    {{ $property->title }}
</x-mail::button>

---

## Détails du contact :

- **Prénom :** {{ $data['firstname'] }}
- **Nom :** {{ $data['lastname'] }}
- **Téléphone :** {{ $data['phone'] }}
- **Email :** {{ $data['email'] }}

---

## Message :
{{ $data['message'] }}

<x-mail::panel>
Merci de prendre contact avec cette personne dès que possible pour discuter des détails du bien.
</x-mail::panel>

<x-mail::footer>
Ceci est un message automatique, veuillez ne pas y répondre directement.
</x-mail::footer>

</x-mail::message>
