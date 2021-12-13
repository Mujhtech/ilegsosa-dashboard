import React from "react";
import ReactDOM from "react-dom";
import App from "./Index";
import { Provider } from "react-redux";
import { store } from "./stores/index";

ReactDOM.render(
    <React.StrictMode>
        <Provider store={store}>
            <App />
        </Provider>
    </React.StrictMode>,
    document.getElementById("app")
);