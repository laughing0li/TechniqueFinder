## Instructions for installing development environment for Google App Engine on Ubuntu

**Upgrade and Update**

```
$ sudo apt update
$ sudo apt upgrade
```

---

**Install**

1. Install php-cli:

```
$ sudo install php7.4-cli
```

2. Install composer:
```
$ sudo apt install composer
```

3. Install gcloud:

Follow instructions here: https://cloud.google.com/sdk/docs/install#deb

4. Then either:

>```
>$ gcloud init
>```

Or:

>```
>$ gcloud auth login
>```
>
> Then login via browser link
>
> Hit “Allow”, enter in verification code
>
> Now logged in and can set config:
>
>```
>$ gcloud config set project <project-name-goes-here>
>$ gcloud config set compute/zone <zone-goes-here>
>$ gcloud config set compute/region <region-goes-here>
> ```

---

**Clone Repository**

```
git clone https://github.com/AuScope/TechniqueFinder.git
```

---

**Install Third Party Modules**

```
cd application/third_party
composer install
cd ../..
```

---

**Add in database password etc.**

```
cp app.yaml.example app.yaml
vi app.yaml
```

```
cp application/third_party/.env.example application/third_party/.env
vi application/third_party/.env
```

---

**Deploy**

```
gcloud app deploy 
```
