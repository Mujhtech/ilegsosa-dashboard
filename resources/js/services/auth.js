import { http } from "./http";
var CryptoJS = require("crypto-js");

export function register(data) {
    return http().post("/auth/register", data);
}

export function login(data) {
    return http()
        .post("/auth/login", data)
        .then((response) => {
            if (response.status === 200) {
                setToken(response.data);
            }
            return response.data;
        });
}

function setToken(data) {
    let input = [{ token: data.data.access_token }, { user: data.data.user }];
    let ciphertext = CryptoJS.AES.encrypt(
        JSON.stringify(input),
        "ILEGSOSA"
    ).toString();
    localStorage.setItem("ISUT", ciphertext);
}

export function isLoggedIn() {
    const token = localStorage.getItem("ISUT");

    if (token === "" || token == null) {
        return null;
    }

    return token;
}

export function userLogout() {
    http().get("/auth/logout");
    localStorage.removeItem("ISUT");
}

export function getAccessToken() {
    const user = localStorage.getItem("ISUT");
    if (!user) {
        return null;
    }

    let bytes = CryptoJS.AES.decrypt(user, "ILEGSOSA");
    let plaintext = JSON.parse(bytes.toString(CryptoJS.enc.Utf8));
    return plaintext[0].token;
}

export function getUser() {
    const user = localStorage.getItem("ISUT");
    if (!user) {
        return null;
    }

    let bytes = CryptoJS.AES.decrypt(user, "ILEGSOSA");
    let plaintext = JSON.parse(bytes.toString(CryptoJS.enc.Utf8));
    return plaintext[1].user;
}

export function getProfile() {
    return http().get("/");
}
