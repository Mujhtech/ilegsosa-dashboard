import { toast } from "react-toastify";

export const notification = (msg) => {
    toast("🦄 " + msg + "!", {
        position: "top-right",
        autoClose: 5000,
        hideProgressBar: false,
        closeOnClick: true,
        pauseOnHover: true,
        draggable: true,
        progress: undefined,
    });
};

export const Constant = {
    API_URL: "http://127.0.0.1:8000/api/v1",
    SERVER_URL: "http://127.0.0.1:8000",
    SET_USER_LOGIN: "SET_USER_LOGIN",
    SET_USER_LOGOUT: "SET_USER_LOGOUT",
    SET_USER_PROFILE: "SET_USER_PROFILE",
    SET_APP_SETTING: "SET_APP_SETTING",
    SET_USER_LOCK: "SET_USER_LOCK",
    SET_USER_UNLOCK: "SET_USER_UNLOCK",
    GET_SUBSCRIPTION: "GET_SUBSCRIPTION",
    ADD_SUBSCRIPTION: "ADD_SUBSCRIPTION",
    REMOVE_SUBSCRIPTION: "REMOVE_SUBSCRIPTION",
    CHANGE_PLAN: "CHANGE_PLAN"
};

