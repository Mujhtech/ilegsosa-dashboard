import React, { useState } from 'react';
import { useDispatch } from "react-redux";
import { setLogin } from "../../actions/user";
import { login } from "../../services/auth";
import { useHistory } from "react-router-dom";
import { notification } from "../../constant";
import { BeatLoader } from "react-spinners";

export default function Login() {
    const [states, setStates] = useState({
        email: "5thquarantlimited@gmail.com",
        password: "12345678",
        loading: false,
        checked: false,
    });

    function updateState(name, value) {
        setStates({
            ...states,
            [name]: value,
        });
    }

    const history = useHistory();
    const dispatch = useDispatch();

    const loggedIn = async (e) => {
        e.preventDefault();
        try {
            updateState("loading", true);
            const response = await login({
                email: states.email,
                password: states.password,
            });
            updateState("loading", false);
            updateState("email", "");
            updateState("password", "");
            dispatch(setLogin(response.data.user));
            history.push({
                pathname: "/",
            });
        } catch (err) {
            updateState("loading", true);
            if (!err.response) return;
            if (err.response.data.data) {
                notification(err.response.data.data.message);
            }
            console.log(err.response.data.data.message);
        }
    };



    return (
        <section className="section">
            <div className="container mt-5">
                <div className="row">
                    <div className="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

                        <div className="card card-primary">
                            <div className="card-header"><h4>Login</h4></div>

                            <div className="card-body">
                                <form method="POST" onSubmit={(e) => loggedIn(e)} className="needs-validation" noValidate="">
                                    <div className="form-group">
                                        <label htmlFor="email">Email</label>
                                        <input id="email" type="email" className="form-control" name="email" tabIndex="1" disabled={states.loading} value={states.email}
                                            onChange={(e) => updateState("email", e.target.value)} required autoFocus />
                                        <div className="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>

                                    <div className="form-group">
                                        <div className="d-block">
                                            <label htmlFor="password" className="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password" className="form-control" name="password" disabled={states.loading} value={states.password}
                                            onChange={(e) => updateState("password", e.target.value)} tabIndex="2" required />
                                        <div className="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>

                                    <div className="form-group">
                                        <div className="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" className="custom-control-input" tabIndex="3" id="remember-me" defaultChecked={states.checked}
                                                onChange={() => updateState("checked", !states.checked)} />
                                            <label className="custom-control-label" htmlFor="remember-me">Remember Me</label>
                                        </div>
                                    </div>

                                    <div className="form-group">
                                        <button type="submit" className="btn btn-primary btn-lg btn-block" tabIndex="4" disabled={
                                            states.loading ||
                                                states.email === "" ||
                                                states.password === ""
                                                ? "disabled"
                                                : ""
                                        }>
                                            {states.loading ? <BeatLoader color="#ffffff" size={10} /> : "Login"}
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div className="simple-footer">
                            Copyright &copy; ILEGSOSA 2021
                        </div>
                    </div>
                </div>
            </div>
        </section>
    )
}
