import React, { useState } from 'react'

export default function Register() {

    const [states, setStates] = useState({
        email: "",
        password: "",
        loading: false,
        checked: false,
    });

    function updateState(name, value) {
        setStates({
            ...states,
            [name]: value,
        });
    }


    return (
        <section className="section">
            <div className="container mt-5">
                <div className="row">
                    <div className="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

                        <div className="card card-primary">
                            <div className="card-header"><h4>Register</h4></div>

                            <div className="card-body">
                                <form method="POST" action="#" className="needs-validation" noValidate="">
                                    <div className="form-group">
                                        <label htmlFor="email">Email</label>
                                        <input id="email" type="email" className="form-control" name="email" tabIndex="1" value={states.email}
                                            onChange={(e) => updateState("email", e.target.value)} required autoFocus />
                                        <div className="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>

                                    <div className="form-group">
                                        <div className="d-block">
                                            <label htmlFor="password" className="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password" className="form-control" name="password" value={states.password}
                                            onChange={(e) => updateState("password", e.target.value)} tabIndex="2" required />
                                        <div className="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>

                                    <div className="form-group">
                                        <div className="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" className="custom-control-input" tabIndex="3" id="remember-me" />
                                            <label className="custom-control-label" htmlFor="remember-me">Remember Me</label>
                                        </div>
                                    </div>

                                    <div className="form-group">
                                        <a href="index.html" type="submit" className="btn btn-primary btn-lg btn-block" tabIndex="4">
                                            Register
                                        </a>
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
