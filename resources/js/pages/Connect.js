import React from 'react'
import Nav from '../components/Nav'
import Sidebar from '../components/Sidebar'

export default function Connect() {
    return (
        <div className="main-wrapper">
            <div className="navbar-bg"></div>
            <Nav />
            <Sidebar />
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Connect with Mates</h1>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Basic DataTables</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        #
                                                    </th>
                                                    <th>Set</th>
                                                    <th>Members</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>
                                                        1
                                                    </td>
                                                    <td>1960/64 Set</td>
                                                    <td>
                                                        <img alt="image" src="../assets/img/avatar/avatar-2.png" class="rounded-circle" width="35" />
                                                        <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" />
                                                        <img alt="image" src="../assets/img/avatar/avatar-4.png" class="rounded-circle" width="35" />
                                                        <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" />
                                                    </td>
                                                    <td><a href="connect-chats.html" class="btn btn-secondary">Request Access</a></td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    )
}
